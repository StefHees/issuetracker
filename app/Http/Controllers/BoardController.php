<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Issue;

class BoardController extends Controller
{


    public function tree(Request $request)
    {
        $issues = Issue::all();
        return view('board.tree', ['issues' => $issues]);
    }


    public function dashboard(Request $request)
    {
        $statuses = Status::all();
        return view('board.overview', ['statuses' => $statuses]);
    }

}
