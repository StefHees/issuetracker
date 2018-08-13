<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::all();

        return view('issue.index', ['issues' => $issues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $clients = Client::all();

        return view('issue.create', ['clients' => $clients, 'users' => $users]);
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
            'type' => 'required',
            'description' => 'required',
            'client_id' => 'required',
        ]);

        $attributes = $request->all();

        $issue = Issue::create($attributes);

        foreach($request->get('users', []) as $user){
            $issue->users()->attach($user);
        }

        Session::flash('status', 'Issue was successfully added!');
        Session::flash('class', 'alert-success');

        return redirect()->route('issues.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        return view('issue.show', ['issue' => $issue]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        $clients = Client::all();
        $users = User::all();
        return view('issue.edit', ['clients' => $clients, 'issue' => $issue, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        $this->validate($request, [
            'title' => 'required',
            'type' => 'required',
            'description' => 'required',
            'client_id' => 'required',
        ]);

        $attributes = $request->all();

        $issue->update($attributes);

        $issue->users()->detach();
        foreach($request->get('users', []) as $user){
            $issue->users()->attach($user);
        }

        Session::flash('status', 'Issue was successfully updated!');
        Session::flash('class', 'alert-success');

        return redirect()->route('issues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        $issue->users()->detach();
        $issue->delete();

        Session::flash('status', 'Issue has been deleted!');
        Session::flash('class', 'alert-danger');
        return redirect()->route('issues.index');
    }
}
