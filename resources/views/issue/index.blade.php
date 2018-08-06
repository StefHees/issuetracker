@extends('layouts.app')

@section('content')
<div class="col-10 m-auto mt-5">
    <a class="btn btn-lg btn-success text-white mb-3" href="{{ route('issues.create') }}"><i class="fas fa-plus"></i> Add Issue</a>
    @foreach($issues as $issue)

    <div class="card mt-3 mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-11">
                    <h5 class="m-0">{{ $issue->title }}</h5>
                </div>
                <div class="col">
                    <div class="row">
                    <a href="{{ route('issues.edit', [$issue]) }}"  class="btn btn-sm btn-primary mr-1">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    {!! \Form::open(['route' => ['issues.destroy', $issue], 'method' => 'delete']) !!}
                    {!! \Form::button('<i class="fas fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) !!}
                    {!! \Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Type: {{ $issue->type }}</p>
            <p class="card-text">Teammembers: @foreach($issue->users as $user){{ $user->name }}, @endforeach</p>
            <p class="card-text">Client: {{ $issue->client->name }}</p>
            <p class="card-text">{{$issue->description}}</p>
            <a href="{{ route('issues.show', $issue) }}" class="btn btn-primary">Details</a>
        </div>
    </div>
    @endforeach
    </div>
@endsection