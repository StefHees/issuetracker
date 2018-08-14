<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Status;
use App\Models\Client;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::whereNull('task_id')->get();

        return view('task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        $clients = Client::all();
        $users = User::all();
        $tasks = Task::all();
        $types = Type::all();
        return view('task.create', ['statuses' => $statuses, 'clients' => $clients, 'users' => $users, 'tasks' => $tasks, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'estimation' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'priority' => 'required',
            'status_id' => 'required',
            'type_id' => 'required',
            'client_id' => 'required',
        ]);

        $attributes = $request->all();

        Task::create($attributes);

        Session::flash('status', 'Task was successfully added!');
        Session::flash('class', 'alert-success');

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.edit', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $statuses = Status::all();
        $tasks = Task::all();
        return view('task.edit', ['task' => $task, 'statuses' => $statuses, 'tasks' => $tasks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'title' => 'required',
            'estimation' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'priority' => 'required',
            'issue_id' => 'required',
            'status_id' => 'required',
        ]);
        $attributes = $request->all();

        $task->update($attributes);

        Session::flash('status', 'Task was successfully edited!');
        Session::flash('class', 'alert-success');

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        Session::flash('status', 'Task was successfully destroyed!');
        Session::flash('class', 'alert-warning');

        return redirect()->route('tasks.index');
    }
}
