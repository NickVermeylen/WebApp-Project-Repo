@extends('layouts.app')

@section("content")
    <div class="container">
    <h1 >Adding a new show</h1>
    <form class="form-horizontal" action={{ url('shows') }} method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="control-label col-sm-2" for="name" name="name">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter the file name here...">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="description" name="description" placeholder="Enter a description for your file here...">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="path">Slideshow</label>
            <input type="file" id="path" name="path" accept="application/pdf" data-allowed-file-extensions='["pdf"]'>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
    </div>

@stop