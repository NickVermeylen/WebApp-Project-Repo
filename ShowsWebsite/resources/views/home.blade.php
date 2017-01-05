@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <button type="button" class="btn btn-default" aria-label="Left Align">
                        <a href="{{ url('shows/create') }}">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Add a new Doc
                        </a>
                    </button>
                    <a class="btn btn-default" href="{{ URL::to('shows') }}">Show all shows</a>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
