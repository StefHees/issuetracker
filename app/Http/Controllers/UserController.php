<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Request;

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
        $this->validate($request, $request->userRules());
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
        if(auth()->user()->isAdmin() || auth()->user()->id == $id) {
            $user = User::findOrFail($id);
            return view('users/show')->with([ 'user' => User::findOrFail($id) ]);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->isAdmin() || auth()->user()->id == $id) {
            $user = User::findOrFail($id);
            return view('users/edit')->with([ 'user' => User::findOrFail($id) ]);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(auth()->user()->isAdmin() || auth()->user()->id == $request->get('id')) {
            $this->validate($request, $request->userRules());

            $user = User::findOrFail($request->get('id'));
            // Handle the user upload of avatar
            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');
                $filename = uniqid('', true) . '.' . $avatar->getClientOriginalExtension();

                \Image::make($avatar)->save(storage_path('app/avatars/' . $filename ));

                if($user->avatar != 'profile.png') {
                    File::delete(storage_path('app/avatars/' . $user->avatar));
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
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(auth()->user()->isAdmin() || auth()->user()->id == $request->get('id')) {
            $this->validate($request, $request->userRules());

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
        } else {
            return redirect()->route('home');
        }
    }
}
