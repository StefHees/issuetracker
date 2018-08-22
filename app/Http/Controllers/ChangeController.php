<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Request;

class ChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function change_password(Request $request) {
        if(auth()->user()->isAdmin() || auth()->user()->id == $request->id) {
            $user = User::findOrFail($request->id);
            return view('users.password')->with(['user' => $user]);
        } else {
            return redirect()->route('home');
        }
    }

    public function update_password(Request $request) {
        $this->validate($request, $request->userRules());
        $user = User::findOrFail($request->get('id'));

        $attributes = $request->all();
        $attributes['password'] = Hash::make($request['password']);
        if($user->update($attributes) == true) {
            event(new \App\Events\UserModified(User::find($user['id'])));
        } else {
            session()->flash('error', 'Password change failed.');
        };
        return redirect()->route('users.show', $request->get('id'));
    }

}
