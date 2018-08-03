@extends('layouts.app')

@section('content')
    <div class="col-10 m-auto mt-5">
        <a class="btn btn-lg btn-success text-white mb-3" href="{{ route('issues.create') }}"><i class="fas fa-plus"></i> Add Issue</a>

            <div class="card">
                <div class="card-header">
                    {{ $issue->title }} for
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $issue->client->name }}</h5>
                    <p class="card-text">Type: {{ $issue->type }}</p>
                    <p class="card-text">{{$issue->description}}</p>
                    <a href="#" class="btn btn-primary">Details</a>
                </div>
            </div>
    </div>
@endsection