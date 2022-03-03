@extends('layouts.admin.admin_layout')

@section('title', 'orders: admin page')

@section('content')

    <table class="table table-success table-striped table-hover mt-5 table-bordered border-primary">
        <tr>
            {{-- <th>#</th> --}}
            <th>user id</th>
            <th>user name</th>
            <th>user email</th>
            <th>course name</th>
            <th>course id</th>
            <th>course price</th>
            <th>order created_at</th>

            {{-- <th>level</th>
        <th>category</th>
        <th>duration(days)</th>
        <th>description</th>
        <th>price</th>
        <th>created at</th>
        <th>updated at</th>
        <th>orders count </th> --}}
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

                    {{-- {{ $news->name }} --}}

                    {{-- <td>{{ $user['id'] }}</td>
                     <td>{{ $course['name'] }}</td>
                     <td>{{ $course['level'] }}</td>
                     <td>{{ $course['category'] }}</td>
                     <td>{{ $course['day_duration'] }}</td>
                     <td>{{ $course['description'] }}</td>
                     <td>{{ $course['price'] }}</td>
                     <td>{{ $course['created_at'] }}</td>
                     <td>{{ $course['updated_at'] }}</td> --}}
                    {{-- <td>{{ $course->users->count() }}</td> --}}
                </tr>
            @endforeach
        @endforeach
    </table>



@endsection
