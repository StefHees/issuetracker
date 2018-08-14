<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {

        $user = \App\Models\User::where('name', "Admin")->first();

        if(is_null($user)) {
            User::create(array(
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('secret'),
                'role' => 'admin',
            ));
        }
    }
}