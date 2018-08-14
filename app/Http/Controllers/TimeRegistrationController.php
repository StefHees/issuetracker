<?php

namespace App\Http\Controllers;

use App\Models\TimeRegistrations;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TimeRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TimeRegistrations = TimeRegistrations::all();
        return view('timeRegistration.index', ['TimeRegistrations' => $TimeRegistrations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Users = User::orderBy('name', 'asc')->pluck('name', 'id')->toArray();
        $Tasks = Task::orderBy('remarks', 'asc')->pluck('remarks', 'id')->toArray();
        return view('timeRegistration.create', ['Users' => $Users], ['Tasks' => $Tasks]);
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
            'user_id' => 'required',
            'task_id' => 'required',
            'time_in_minutes' => 'required',
        ]);

        $attributes = $request->all();

        TimeRegistrations::create($attributes);
        Session::flash('status', 'Registration was successfully added!');
        Session::flash('class', 'alert-success');
        return redirect()->route('time_registrations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeRegistrations $TimeRegistration)
    {
        $Users = User::orderBy('name', 'asc')->pluck('name', 'id')->toArray();
        $Tasks = Task::orderBy('remarks', 'asc')->pluck('remarks', 'id')->toArray();
        return view('timeRegistration.edit', ['TimeRegistration' => $TimeRegistration, 'Users' => $Users, 'Tasks' => $Tasks]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeRegistrations $TimeRegistration)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'task_id' => 'required',
            'time_in_minutes' => 'required',
        ]);

        $attributes = $request->all();

        $TimeRegistration->update($attributes);
        Session::flash('status', $TimeRegistration->remarks.' has been editted!');
        Session::flash('class', 'alert-success');
        return redirect()->route('time_registrations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeRegistrations $TimeRegistration)
    {
        $TimeRegistration->delete();
        Session::flash('status', $TimeRegistration->remarks.' has been deleted!');
        Session::flash('class', 'alert-success');
        return redirect()->route('time_registrations.index');
    }
}
