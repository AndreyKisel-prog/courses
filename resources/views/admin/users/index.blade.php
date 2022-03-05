@extends('layouts.admin.admin_layout')

@section('title', 'users: admin page')

@section('content')


    <table class="table table-success table-striped table-hover mt-5 table-bordered border-primary">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>role</th>
            <th>email</th>
            <th>created at</th>
            <th>updated at</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user->getRoleNames()[0] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['created_at'] }}</td>
                <td>{{ $user['updated_at'] }}</td>
                <td>
                    <a href={{ route('users.edit', $user->id) }} class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
