@extends('layouts.admin.admin_layout')
@section('title', 'moderator home page')
@section('content')
    <div class="carousel-inner ">
        <div class="carousel-item active">
            <svg class="bd-placeholder-img" width="100%" height="400px" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect width="100%" height="100%" fill="#1e5206"></rect>
            </svg>
            <div class="container">
                <div class="carousel-caption">
                    <h1>Courses table</h1>
                    <p>as a moderator you can create or edit any course </p>
                    <p>(except eliminate it)</p>
                    <p><a class="btn btn-lg btn-warning" href="{{ route('moderator.courses.index') }}">Go to courses table</a></p>
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
