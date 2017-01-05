@extends('layouts.app')

@section('content')
    <div class="container">
    <h1 class="col-md-8 col-md-offset-2">All the Shows</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
        <div class="col-md-8 col-md-offset-2">
            @if (Session::has('success_upload'))
                <div class="alert alert-success alert-dismissable fade in ">
                    Show werd toegevoegd!
                </div>
            @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($shows as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('shows/' . $value->id) }}">Show this show</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('shows/' . $value->id . '/edit') }}">Edit this Show</a>
                    <form method="POST" action="{{ URL::to('shows/' . $value->id ) }}" class="pull-right">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-small btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection