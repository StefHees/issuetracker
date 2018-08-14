<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            "title" => 'Task',
        ]);
        DB::table('types')->insert([
            "title" => 'Bug',
        ]);
        DB::table('types')->insert([
            "title" => 'Design',
        ]);
        DB::table('types')->insert([
            "title" => 'Front-end',
        ]);
        DB::table('types')->insert([
            "title" => 'Back-end',
        ]);
    }
}
