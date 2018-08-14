<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangeController extends Controller
{
    public function change_password(Request $request) {
        $user = User::findOrFail(auth()->user()->id);
        return view('change.password')->with(['user' => $user]);
    }

    public function update_password(Request $request) {
        //dd($request);
        //$this->validate($request, $this->rules($user->id));
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->get('id'),
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,agent,customer', //validate role input
        ]);

        $user = User::findOrFail($request->get('id'));
        $attributes = $request->all();
        $attributes['password'] = Hash::make($request['password']);
        //dd($attributes);
        if($user->update($attributes) == true) {
            session()->flash('success', 'Password changed.');
            //event(new \App\Events\UserModified(User::find($user['id'])));
        } else {
            session()->flash('error', 'Password change failed.');
        };
        return redirect()->route('users.edit', $request->get('id'));
    }

    public function rules($id)
    {
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
                {
                    return [
                        'id'    =>  'required',
                    ];
                }
            case 'POST':
                {
                    return [
                        'user.name'         => 'required|string|max:255',
                        'user.email'        => 'required|string|email|max:255|unique:users|',
                        'user.password'     => 'required|string|min:6|confirmed',
                        'user.role'         => 'required|in:admin,agent,customer', //validate role input
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'user.name'         => 'required|string|max:255',
                        'user.email'        => 'required|string|email|max:255|unique:users,email,'.$id,
                        'user.password'     => 'required|string|min:6|confirmed',
                        'user.role'         => 'required|in:admin,agent,customer', //validate role input
                    ];
                }
            default:break;
        }
    }
}
