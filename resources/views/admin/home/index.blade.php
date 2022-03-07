@extends('layouts.admin.admin_layout')
@section('title', 'admin home page')
@section('content')
    <div class="d-flex justify-content-center my-5">
        <div style="width: 800px;height: 400px" id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class=""
                    aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
                    class=""></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"
                    class="" aria-current="true"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 3"
                    class="active" aria-current="true"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="400px" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
                        <rect width="100%" height="100%" fill="#1e5206"></rect>
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Table Users</h1>
                            <p>Add, delete, edit, change roles</p>
                            <p><a class="btn btn-lg btn-warning" href="{{ route('users.index') }}">Go to 'users' table</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="400px" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#1e5206"></rect>
                    </svg>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Courses table</h1>
                            <p>All courses description</p>
                            <p>Create, delete, edit description of course</p>
                            <p><a class="btn btn-lg btn-warning" href="{{ route('admin.courses.index') }}">Go to courses
                                    table</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="400px" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#1e5206"></rect>
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>'Roles' table</h1>
                            <p>---------</p>
                            <p>create, add, edit</p>
                            <p><a class="btn btn-lg btn-warning" href="{{ route('roles.index') }}">Go to roles table</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="400px" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="#1e5206"></rect>
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Table orders</h1>
                            <p>Info about orders and appropriate users</p>
                            <p>----------------</p>
                            <p><a class="btn btn-lg btn-warning" href="{{ route('orders.index') }}">Go to orders table</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection
