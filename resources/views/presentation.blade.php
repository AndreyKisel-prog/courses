@extends('layouts.presentation_layout')
@section('title', 'demo')
@section('content')
@include("components.alert")
    <body>
        <h1 class='my-2 text-warning text-center'>Our courses:</h1>
        <div class="d-flex justify-content-center my-2">
            <div style="width: 800px;height: 400px" id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($courses as $index => $course)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <svg class="bd-placeholder-img" width="100%" height="400px" xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"> -->
                                <rect width="100%" height="100%" fill="#1e5206"></rect>
                            </svg>
                            <div class="container">
                                <div class="carousel-caption text-start">
                                    <h1>{{ $course->name }}</h1>
                                    <p>{{ $course->description }}</p>
                                    <p>{{ $course->day_duration }} days</p>
                                    <p><a class="btn btn-lg btn-warning" href="{{route('item.index', $course->id)}}">find out price and more info</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
    </body>
@endsection
