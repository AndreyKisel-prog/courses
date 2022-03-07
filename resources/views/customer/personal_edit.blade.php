@extends('layouts.admin.admin_layout')
@section('title', 'user: edit repsonal page')
@section('content')
    @include("components.validation_errors_messages")
    <div class="p-2 container">
        <div class="card card-info mt-4">
            <div class="card-header">
                <h2 class="card-title">edit user: id({{ $user->id }})</h2>
            </div>
            <form action="{{ route('personal.update', $user->id) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <label for="name">Name: </label>
                    <div class="input-group">
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name">
                    </div>
                    <label for="email" class="align-baseline mt-2">email: </label>
                    <div class="input-group">
                        <input type='emeil' class="form-control my-1" name="email" id="email" value="{{ $user->email }}">
                    </div>
                    <label for="password" class="align-baseline mt-2">password: </label>
                    <div class="input-group">
                        <input type='password' class="form-control my-1" name="password" id="password" value="">
                    </div>
                    <div class=" input-group  d-flex justify-content-end">
                        <button type="submit" class="btn btn-info my-2 ">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
