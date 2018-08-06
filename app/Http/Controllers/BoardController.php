<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class BoardController extends Controller
{
    public function overview(Request $request)
    {
        $statuses = Status::all();
        return view('board.overview', ['statuses' => $statuses]);
    }
}
