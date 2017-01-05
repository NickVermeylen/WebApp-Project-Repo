@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="col-md-8 col-md-offset-2">All the Users</h1>

        <!-- will be used to show any messages -->
        <div class="col-md-8 col-md-offset-2">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>

                        <td>
                            @if($value->isAdmin())
                                <a class="btn btn-small btn-success" href="{{URL::to('users/'. $value->id . "/admin/0")}}">Admin</a>
                            @else
                                <a class="btn btn-small btn-danger" href="{{URL::to('users/'. $value->id . "/admin/1")}}">Guest</a>
                            @endif

                            <form method="POST" action="{{ URL::to('users/' . $value->id ) }}" class="pull-right">
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