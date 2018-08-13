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
        $status = \App\Models\Status::where('status_name', "To do")->first();

        if(is_null($status)) {
            \App\Models\Status::create([
                "status_name" => "To do",
                "status_description" => "Task still has to start",
                "dashboard_color_hex" => "#f7f7f7",
                "dashboard_order" => 0,
            ]);
        }

        $status = \App\Models\Status::where('status_name', "In progress")->first();

        if(is_null($status)) {
            \App\Models\Status::create([
                "status_name" => "In progress",
                "status_description" => "Task is being worked on",
                "dashboard_color_hex" => "#f7f7f7",
                "dashboard_order" => 10,
            ]);
        }

        $status = \App\Models\Status::where('status_name', "Code review")->first();

        if(is_null($status)) {
            \App\Models\Status::create([
                "status_name" => "Code review",
                "status_description" => "Ready for review by a senior developer",
                "dashboard_color_hex" => "#f7f7f7",
                "dashboard_order" => 20,
            ]);
        }

        $status = \App\Models\Status::where('status_name', "Done")->first();

        if(is_null($status)) {
            \App\Models\Status::create([
                "status_name" => "Done",
                "status_description" => "Task has been completed",
                "dashboard_color_hex" => "#f7f7f7",
                "dashboard_order" => 30,
            ]);
        }
    }
}
