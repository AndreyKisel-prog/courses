@extends('layouts.admin.admin_layout')
@section('title', 'courses: admin page')
@section('content')
    <a href="{{ route('admin.courses.create') }}" class="mt-4 btn btn-lg btn-success">Push the button to add new course</a>
    <h3 class="text-center">All courses:</h3>
    <table class="table table-success table-striped table-hover mt-3 table-bordered border-primary">
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
            <th></th>
            <th></th>
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
                <td>
                    <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
