@extends('layouts.app')

@section('content')

    <div class="m-auto col-10 mt-5">
        <div class="navbar navbar-dark bg-dark">
            @if ( auth()->user()->isAdmin() )

            <a class="btn btn-success text-white" href="{{ route('statuses.create') }}"><i class="fas fa-plus"></i> Add Status</a>
            @endif

        </div>
        @if($statuses !== null)

            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Color (hex)</th>
                    <th scope="col">Order <br>
                    (as appearing on Dashboard)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($statuses as $status)

                    <tr>
                        <th scope="row">{{ $status->id }}</th>
                        <td>{{ $status->status_name }}</td>
                        <td>{{ $status->status_description }}</td>
                        <td>{{ $status->dashboard_color_hex }}</td>
                        <td>{{ $status->dashboard_order }}</td>
                        <td>
                            @if ( auth()->user()->isAdmin() )

                            <div class="row align-content-between">
                                <a href="{{ route('statuses.edit', [$status]) }}"  class="btn btn-sm btn-primary m-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                {!! \Form::open(['route' => ['statuses.destroy', $status], 'method' => 'delete']) !!}
                                {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger m-1']) !!}
                                {!! \Form::close() !!}
                            </div>
                            @endif

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @else

            <h3>You have no statuses! :(</h3>
        @endif

    </div>
@endsection