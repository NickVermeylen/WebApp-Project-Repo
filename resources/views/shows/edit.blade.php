@extends('layouts.app')

@section("content")
    <div class="container">
        <h1>{{$show->name}}</h1>
        <form class="form-horizontal" action={{ url('shows/update') }} method="POST">
            {{ csrf_field() }}
            {{method_field('PATCH')}}
            <div class="form-group">
                <label class="control-label col-sm-2" for="name" name="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{$show->name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="description">Description:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description" value="{{$show->description}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Edit</button>
                </div>
            </div>
        </form>
    </div>

@stop