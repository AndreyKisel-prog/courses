@extends('layouts.app')

@section('content')
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

                        @if (Auth::user()->getRoleNames()[0] == 'admin')
                            <div class="card-body my-5">
                                <a href="{{ route('admin.show') }}" class="alert alert-success text-decoration-none"
                                    role="alert">
                                    Let's go to admin's cabinet
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
