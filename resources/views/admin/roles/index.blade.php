@extends('layouts.admin.admin_layout')
@section('title', 'roles: admin page')
@section('content')
    <table class="table table-success table-striped table-hover mt-5 table-bordered border-primary">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>guard name</th>
            <th>created at</th>
            <th>updated at</th>
        </tr>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role['id'] }}</td>
                <td>{{ $role['name'] }}</td>
                <td>{{ $role['guard_name'] }}</td>
                <td>{{ $role['created_at'] }}</td>
                <td>{{ $role['updated_at'] }}</td>
            </tr>
        @endforeach
    </table>
@endsection
