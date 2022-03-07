@extends('layouts.admin.admin_layout')
@section('title', 'orders: admin page')
@section('content')
    <table class="table table-success table-striped table-hover mt-5 table-bordered border-primary">
        <tr>
            <th>user id</th>
            <th>user name</th>
            <th>user email</th>
            <th>course name</th>
            <th>course id</th>
            <th>course price</th>
            <th>order created_at</th>
        </tr>
        @foreach ($users as $user)
            @foreach ($user->courses as $course)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->price }}</td>
                    <td>{{ $course->pivot->created_at }}</td>
                </tr>
            @endforeach
        @endforeach
    </table>
@endsection
