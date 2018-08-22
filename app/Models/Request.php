<?php
/**
 * Created by PhpStorm.
 * User: freek
 * Date: 8/21/18
 * Time: 1:22 PM
 */

namespace App\Models;

use Illuminate\Http\Request as Requestable;

class Request extends Requestable
{
    public function userRules()
    {
        switch($this->method())
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
                        'email' => 'required|string|email|max:255|unique:users',
                        'password' => 'required|string|min:6|confirmed',
                        'role' => 'required|in:admin,agent,customer', //validate role input
                    ];
                }
            case 'PUT':
                {
                    return [
                        'name' => 'required|string|max:255',
                        'email' => 'required|string|email|max:255|unique:users,email,'.$this->get('id'),
                        'role' => 'required|in:admin,agent,customer', //validate role input
                    ];
                }
            case 'PATCH':
                {
                    return [
                        'name' => 'required|string|max:255',
                        'email' => 'required|string|email|max:255|unique:users,email,'.$this->get('id'),
                        'password' => 'required|string|min:6|confirmed',
                        'role' => 'required|in:admin,agent,customer', //validate role input
                    ];
                }
            default:break;
        }
    }

    public function validate_user() {
        return $this->validate($this, $this->userRules());
    }
}