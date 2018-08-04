<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        return view('status.index', ['statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status.create');
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
            'status_name' => 'required',
            'dashboard_color_hex' => 'required',
            'dashboard_order' => 'required',
        ]);

        $attributes = $request->all();

        Status::create($attributes);
        Session::flash('status', 'Status was successfully added!');
        Session::flash('class', 'alert-success');
        return redirect()->route('statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //not implemented
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('status.edit', ['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $this->validate($request, [
            'status_name' => 'required',
            'dashboard_color_hex' => 'required',
            'dashboard_order' => 'required',
        ]);

        $attributes = $request->all();

        $status->update($attributes);
        Session::flash('status', $status->status_name.' has been editted!');
        Session::flash('class', 'alert-success');
        return redirect()->route('statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();
        Session::flash('status', $status->status_name.' has been deleted!');
        Session::flash('class', 'alert-danger');
        return redirect()->route('statuses.index');
    }
}
