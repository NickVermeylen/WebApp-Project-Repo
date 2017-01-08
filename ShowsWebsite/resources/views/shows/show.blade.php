@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Showing {{ $show->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $show->name }}</h2>
        <p>
            <strong>description:</strong> {{ $show->description }}<br>
        </p>
        <h2>Pdf:</h2>
        <div class='embed-responsive' style='padding-bottom:150%'>
            <object data='/slideshow/laravel/storage/app/public/docs/{{ $show->user_id}}/{{$show->name }}.pdf' type='application/pdf' width='100%' height='500px'></object>
        </div>
    </div>
    </div>
@stop