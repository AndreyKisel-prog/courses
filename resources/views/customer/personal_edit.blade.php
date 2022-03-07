@extends('layouts.admin.admin_layout')
@section('title', 'user: edit repsonal page')
@section('content')
    @include("components.validation_errors_messages")
    <div class="p-2 container">
        <div class="card card-info mt-4">
            <div class="card-header">
                <h2 class="card-title">edit user: id({{ $user->id }})</h2>
            </div>


            <div class="conteiner my-5">
                <div class="container row my-2">
                    <form action="{{ route('personal.update', $user->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="input-group col-md-8">
                            <label class="input-group-text" for="name">Name: </label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>

                <div class="container row my-2">
                    <form action="{{ route('personal.update', $user->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="input-group col-md-8">
                            <label for="email" class="input-group-text">email: </label>
                            <input type='emeil' class="form-control" name="email" id="email" value="{{ $user->email }}">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>

                <div class="container row my-2">
                    <form action="{{ route('personal.update', $user->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <label for="password" class="input-group-text">password: </label>
                            <input type='password' class="form-control" name="password" id="password" value="">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
