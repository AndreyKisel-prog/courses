@extends('layouts.item_layout')
@section('title', 'item page')
@section('content')
    <div class="container d-flex justify-content-center my-4">
        <div class="card" style="width: 600px;background-image:url({{ URL::asset('images/card.jpg') }})">
            <div class="card-body">
                <h3 class="card-title text-center text-warning "> {{ $course->name }}</h5>
                    <span class="card-text">Course duration: {{ $course->day_duration }}</span><br>
                    <span class="card-text">Categoty: {{ $course->category }}</span><br>
                    <p class="card-text">Level: {{ $course->level }}</p><br>
                    <p class="card-text">{{ $course->description }}</p>
                    <span class="card-text text-danger"><b> Price: {{ $course->price }} $</b></span><br>

                    <div class='container row'>
                        <div class="col-md-6">
                            <form action="{{ route('item.store', $course->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name='course_id' value={{ $course->id }}>
                                <div class="conteiner d-flex justify-content-end">
                                    <button type='submit' class="btn btn-success ">Save course</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{ route('shop') }}" class="btn btn-warning">
                                Back to all courses
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
