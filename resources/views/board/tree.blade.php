@extends('layouts.app')

@section('content')

    <div class="m-auto col-11 mt-5">
        <div class="p-5 rounded bg-gray">
            <div class="p-3 rounded bg-white row">
                <h4 class="m-0">Title</h4>
                <h5>Type=Bug</h5>
                <p>Subtasks: </p>
                <div>
                    <div class="btn btn-primary btn-sm">10</div>
                </div>

            </div>
            <div class="row">
                <div class="rounded bg-white row col-12 m-0 mt-2">
                    <h4 class="m-0">Title</h4>
                    <h5>Type=Bug</h5>
                    <p>Subtasks: </p>
                    <div>
                        <div class="btn btn-primary btn-sm">10</div>
                    </div>

                </div>
            </div>

            <div>
                <div class="btn btn-primary">See more <i class="fas fa-angle-down"></i></div>
            </div>
        </div>
    </div>
@endsection