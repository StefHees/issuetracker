<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Status;

class AvatarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request, $filename)
    {
        $user = User::where('avatar', $filename)->first();

        if(!$user) {
            abort(404);
        }

        return \Image::make(storage_path('app/avatars/' . $user->avatar))->resize(300,300)->response();
    }
}
