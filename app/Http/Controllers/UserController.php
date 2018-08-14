<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,agent,customer', //validate role input
        ]);

        $attributes = $request->all();

        if(($User = User::create([
                'name' => $attributes['name'],
                'email' => $attributes['email'],
                'password' => Hash::make($attributes['password']),
                'role' => $attributes['role'],
            ])) == true) {
            session()->flash('success', 'User created successfull.');
            //event(new \App\Events\UserCreated(User::find($User['id'])));
            //\Mail::to(auth()->user())->send(new \App\Mail\UserCreated(\App\Models\User::find($user['id'])));
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
        $user = User::findOrFail($id);

        $data = [
            'user' => $user,
        ];
        return view('users/show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $data = [
            'user' => $user,
        ];
        return view('users/edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->get('id'),
//            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,agent,customer', //validate role input
        ]);

        $attributes = $request->all();
        $user = User::findOrFail($request->get('id'));

        if($user->update($attributes) == true) {
            session()->flash('success', 'User update successfull.');
           // event(new \App\Events\UserModified(User::find($user['id'])));
        } else {
            session()->flash('error', 'User update failed.');
        };
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $user = User::findOrFail($request->get('id'));

        if($user->delete() == true) {
            session()->flash('success', 'User deletion successfull.');
            //event(new \App\Events\UserDeleted($user));
        } else {
            session()->flash('error', 'User delete failed.');
        };
        return redirect()->route('users.index');
    }
}
