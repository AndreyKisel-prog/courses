@extends('layouts.admin.admin_layout')

@section('title', 'courses: admin page')

@section('content')

    <table class="table table-success table-striped table-hover mt-5 table-bordered border-primary">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>level</th>
            <th>category</th>
            <th>duration(days)</th>
            <th>description</th>
            <th>price</th>
            <th>created at</th>
            <th>updated at</th>
            <th>orders count </th>
        </tr>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course['id'] }}</td>
                <td>{{ $course['name'] }}</td>
                <td>{{ $course['level'] }}</td>
                <td>{{ $course['category'] }}</td>
                <td>{{ $course['day_duration'] }}</td>
                <td>{{ $course['description'] }}</td>
                <td>{{ $course['price'] }}</td>
                <td>{{ $course['created_at'] }}</td>
                <td>{{ $course['updated_at'] }}</td>
                <td>{{ $course->users->count() }}</td>
            </tr>
        @endforeach
    </table>
@endsection
