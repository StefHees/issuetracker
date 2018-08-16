<?php
use \App\Models\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'title' => 'Webshop',
            'estimation' => '10',
            'description' => 'Create a webshop',
            'start_date' => Carbon\Carbon::now(),
            'end_date' => Carbon\Carbon::now()->addMonth(2),
            'priority' => 7,
            'status_id' => 1,
            'type_id' => 1,
            'client_id' => 1,
        ]);

        Task::create([
            'title' => 'Make a webshop design',
            'estimation' => 10,
            'description' => 'Requires at least x',
            'start_date' => Carbon\Carbon::now(),
            'end_date' => Carbon\Carbon::now()->addDays(7),
            'priority' => 8,
            'status_id' => 1,
            'type_id' => 1,
            'client_id' => 1,
            'parent_id' => 1,
        ]);

        Task::create([
            'title' => 'Create a logo',
            'estimation' => '3',
            'description' => 'Requires at least x',
            'start_date' => Carbon\Carbon::now(),
            'end_date' => Carbon\Carbon::now()->addDays(3),
            'priority' => 7,
            'status_id' => 1,
            'type_id' => 1,
            'client_id' => 1,
            'parent_id' => 2,
        ]);

        Task::create([
            'title' => 'Create templates',
            'estimation' => 8,
            'description' => 'Requires at least x',
            'start_date' => Carbon\Carbon::now(),
            'end_date' => Carbon\Carbon::now()->addDays(4),
            'priority' => 4,
            'status_id' => 1,
            'type_id' => 1,
            'client_id' => 1,
            'parent_id' => 2,
        ]);

        Task::create([
            'title' => 'Make a homepage template',
            'estimation' => 8,
            'description' => 'Requires at least x',
            'start_date' => Carbon\Carbon::now(),
            'end_date' => Carbon\Carbon::now()->addDays(4),
            'priority' => 4,
            'status_id' => 1,
            'type_id' => 1,
            'client_id' => 1,
            'parent_id' => 4,
        ]);

        Task::create([
            'title' => 'Make templates for other pages',
            'estimation' => 10,
            'description' => 'Requires at least x',
            'start_date' => Carbon\Carbon::now(),
            'end_date' => Carbon\Carbon::now()->addDays(4),
            'priority' => 4,
            'status_id' => 1,
            'type_id' => 1,
            'client_id' => 1,
            'parent_id' => 4,
        ]);

        Task::create([
            'title' => 'Create a mobile application',
            'estimation' => 40,
            'description' => 'Requires at least x',
            'start_date' => Carbon\Carbon::now(),
            'end_date' => Carbon\Carbon::now()->addMonths(4),
            'priority' => 7,
            'status_id' => 1,
            'type_id' => 1,
            'client_id' => 1,
        ]);

    }
}
