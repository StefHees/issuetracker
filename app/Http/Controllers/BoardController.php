<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class BoardController extends Controller
{
    public function dashboard(Request $request)
    {
        $statuses = Status::all();
        return view('board.overview', ['statuses' => $statuses]);
    }

}
