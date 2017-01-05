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
        <object data='/storage/slideshows/{{$show->user_id}}/{{$show->filename}}' width='100%' height='100%'></object>
    </div>
    </div>
@stop