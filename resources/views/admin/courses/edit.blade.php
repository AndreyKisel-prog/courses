@extends('layouts.admin.admin_layout')
@section('title', 'admin: Edit course ')
@section('content')
    <div class="p-2 container">
        <div class="card card-info mt-4">
            <div class="card-header">
                <h2 class="card-title">Edit course: {{ $course->name}} </h2>
            </div>
            @include("components.validation_errors_messages")
            <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <label for="name">Name: </label>
                    <div class="input-group">
                        <input type="text" name="name"
                        value="{{$course->name}}"
                        class="form-control" id="name">
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <label for="level">Level: </label>
                            <div class="input-group">
                                <select class='form-select' type="text" name="level" id="name">
                                   @foreach (['junior', 'middle', 'senior'] as $level):
                                   <option @if($level == $course->level) selected @endif value="{{$level}}">{{$level}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-auto">
                            <label for="category">category: </label>
                            <div class="input-group">
                                <input type="text" name="category"
                                value="{{$course->category}}"
                                class="form-control" id="category">
                            </div>
                        </div>
                        <div class="col-auto">
                            <label for="day_duration">duration (days): </label>
                            <div class="input-group">
                                <input type="number"
                                value="{{$course->day_duration}}"
                                name="day_duration" class="form-control" id="day_duration">
                            </div>
                        </div>
                        <div class="col-auto">
                            <label for="price">price ($): </label>
                            <div class="input-group">
                                <input type="number" name="price"
                                value="{{$course->price}}"
                                class="form-control" id="price">
                            </div>
                        </div>
                    </div>
                    <label for="description">description: </label>
                    <div class="input-group">
                        <textarea type="text" name="description" class="form-control" id="description">
                            {{$course->description}}
                        </textarea>
                    </div>
                    <div class="input-group  d-flex justify-content-end">
                        <button type="submit" class="btn btn-success my-2 ">Save course</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
