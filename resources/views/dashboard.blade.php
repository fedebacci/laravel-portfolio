@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="mt-5">
                        <p>
                            <a href="{{ route('admin.index') }}" target="_blank" class="text-decoration-none">
                                {{ __('Go to Admin Dashboard') }}
                            </a>
                        </p>
                        <p>
                            <a href="{{ route('admin.profile') }}" target="_blank" class="text-decoration-none">
                                {{ __('Go to your profile') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
