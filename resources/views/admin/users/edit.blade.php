@extends('layouts.admin.admin_layout')

@section('title', 'admin: edit user page')

@section('content')

    <div class="p-2 container">
        <div class="card card-info mt-4">
            <div class="card-header">
                <h2 class="card-title">edit user: id({{ $user->id }})</h2>
            </div>

            @if (session('success'))
                <div class="alert alert-success my-3" role="alert">
                    <span aria-hidden="true">{{ session('success') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        X
                    </button>
                </div>
            @endif
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('users.update', $user->id) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <label for="name">Name: </label>
                    <div class="input-group">
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name">
                    </div>

                    <label for="role">role: </label>
                    <div class="input-group">
                        <select name="role" id="role">
                            @foreach ($roles as $role)
                                <option @if ($role == $user->getRoleNames()->all()[0]) selected @endif value="{{ $role }}">
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <label for="email" class="align-baseline mt-2">email: </label>
                    <div class="input-group">
                        <input type='emeil' class="form-control my-1" name="email" id="email" value="{{ $user->email }}">
                    </div>

                    <div class=" input-group  d-flex justify-content-end">
                        <button type="submit" class="btn btn-info my-2 ">Save</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
