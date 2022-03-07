@extends('layouts.app')
@section('content')
    @include("components.alert")
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('You are welcome!') }}</div>
                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Status: you are logged in') }}
                        <div class="container row">
                            @if (Auth::user()->getRoleNames()[0] == 'admin')
                                <div class="card-body my-5 col-md-6 ">
                                    <a href="{{ route('show') }}" class="alert alert-success text-decoration-none"
                                        role="alert">
                                        Let's go to admin's cabinet
                                    </a>
                                </div>
                            @endif
                            @if (Auth::user()->getRoleNames()[0] == 'moderator')
                                <div class="card-body my-5 col-md-6 ">
                                    <a href="{{ route('main') }}" class="alert alert-success text-decoration-none"
                                        role="alert">
                                        Let's go to moderators's cabinet
                                    </a>
                                </div>
                            @endif
                            <div class="card-body my-5 col-md-6 ">
                                <a href="{{ route('shop') }}" class="alert alert-success text-decoration-none"
                                    role="alert">
                                    Show all courses
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Auth::user()->courses()->count())
            <h3>Your courses: </h3>
            <table class="table table-success table-striped table-hover mt-3 table-bordered border-primary">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>level</th>
                    <th>category</th>
                    <th>duration(days)</th>
                    <th>description</th>
                    <th>price</th>
                    <th></th>
                </tr>
                @foreach (Auth::user()->courses()->get()
        as $course)
                    <tr>
                        <td>{{ $course['id'] }}</td>
                        <td>{{ $course['name'] }}</td>
                        <td>{{ $course['level'] }}</td>
                        <td>{{ $course['category'] }}</td>
                        <td>{{ $course['day_duration'] }}</td>
                        <td>{{ $course['description'] }}</td>
                        <td>{{ $course['price'] }}</td>
                        <td>
                            <form action="{{ route('item.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
