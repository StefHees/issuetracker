@extends('layouts.app')

@section('content')

    <div class="m-auto col-10 mt-5">
        <div class="navbar navbar-dark bg-dark">
            <a class="btn btn-success text-white" href="{{ route('types.create') }}"><i class="fas fa-plus"></i> Add Type</a>
        </div>
        @if($types !== null)
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->title }}</td>
                        <td>
                            <div class="row align-content-between">
                                <a href="{{ route('types.edit', [$type]) }}"  class="btn btn-sm btn-primary m-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                {!! \Form::open(['route' => ['types.destroy', $type], 'method' => 'delete']) !!}
                                {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger m-1']) !!}
                                {!! \Form::close() !!}
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif


    </div>
@endsection