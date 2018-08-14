<?php

use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(app()->environment() == 'local') {
            factory(App\Models\User::class, 50)->create();
            factory(App\Models\Client::class, 50)->create();
        }
    }
}
