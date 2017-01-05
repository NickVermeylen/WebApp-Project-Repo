@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Showing {{ $show->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $show->name }}</h2>
        <p>
            <strong>description:</strong> {{ $show->description }}<br>
            <strong>file:</strong> {{ $show->path }}
        </p>
    </div>
    </div>
@stop