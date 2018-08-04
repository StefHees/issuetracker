<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Tod do, In progress, Code review, Done
        DB::table('statuses')->insert([
            "id" => 1,
            "status_name" => "To do",
            "status_description" => "Task still has to start",
            "dashboard_color_hex" => "#f7f7f7",
            "dashboard_order" => 1.1,
        ]);
        DB::table('statuses')->insert([
            "id" => 2,
            "status_name" => "In progress",
            "status_description" => "Task is being worked on",
            "dashboard_color_hex" => "#f7f7f7",
            "dashboard_order" => 1.2,
        ]);
        DB::table('statuses')->insert([
            "id" => 3,
            "status_name" => "Code review",
            "status_description" => "Ready for review by a senior developer",
            "dashboard_color_hex" => "#f7f7f7",
            "dashboard_order" => 1.3,
        ]);
        DB::table('statuses')->insert([
            "id" => 4,
            "status_name" => "Done",
            "status_description" => "Task has been completed",
            "dashboard_color_hex" => "#f7f7f7",
            "dashboard_order" => 1.4,
        ]);

    }
}
