<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin', ['except' => ['show', 'edit', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index') -> with(['users' => User::orderby('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules($request));
        $attributes = $request->all();

        if(($User = User::create([
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'password' => Hash::make($attributes['password']),
                'role' => $attributes['role'],
            ])) == true) {
            event(new \App\Events\UserCreated(User::find($User['id'])));
        } else {
            session()->flash('error', 'User creation failed.');
        };
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users/show')->with([ 'user' => User::findOrFail($id) ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users/edit')->with([ 'user' => User::findOrFail($id) ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, $this->rules($request));

        $user = User::findOrFail($request->get('id'));
        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            \Image::make($avatar)->resize(300, 300)->save( public_path('/storage/avatars/' . $filename ) );
            if($user->avatar != 'profile.png') {
                File::delete('storage/avatars/' . $user->avatar );
            }
        } else {
            $filename = $user->avatar;
        }
        $attributes = $request->all();
        $attributes['avatar'] = $filename;

        if($user->update($attributes) == true) {
            event(new \App\Events\UserModified(User::find($user['id'])));
        } else {
            session()->flash('error', 'User update failed.');
        };
        return redirect()->route('users.show', ['id' => $request->get('id')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $user = User::findOrFail($request->get('id'));
        if($user->avatar != 'profile.png') {
            File::delete('storage/avatars/' . $user->avatar );
        }

        if($user->delete() == true) {
            event(new \App\Events\UserDeleted($user));
        } else {
            session()->flash('error', 'User delete failed.');
        };
        return redirect()->route('users.index');
    }

    public function method(Request $request) {
        return $request->getMethod();
    }

    public function rules(Request $request)
    {
        switch($this->method($request))
        {
            case 'GET':
            case 'DELETE':
                {
                    return [
                        'id' => 'required',
                    ];
                }
            case 'POST':
                {
                    return [
                        'name' => 'required|string|max:255',
                        'email' => 'required|string|email|max:255|unique:users,email,'.$request->get('id'),
                        'role' => 'required|in:admin,agent,customer', //validate role input
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|string|max:255',
                        'email' => 'required|string|email|max:255|unique:users',
                        'password' => 'required|string|min:6|confirmed',
                        'role' => 'required|in:admin,agent,customer', //validate role input
                    ];
                }
            default:break;
        }
    }
}
