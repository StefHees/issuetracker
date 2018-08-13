<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 50)->create();
        factory(App\Models\Client::class, 50)->create();
        $this->call([
            StatusesTableSeeder::class,
            TypeTableSeeder::class,
        ]);


    }
}
