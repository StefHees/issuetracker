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
        $this->validate($request, $this->rules($request));
        $user = User::findOrFail($request->get('id'));

        $attributes = $request->all();
        $attributes['password'] = Hash::make($request['password']);
        if($user->update($attributes) == true) {
            event(new \App\Events\UserModified(User::find($user['id'])));
        } else {
            session()->flash('error', 'Password change failed.');
        };
        return redirect()->route('users.edit', $request->get('id'));
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
