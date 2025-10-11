@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <section class="py-3">
        <div class="container">
            <div class="cor">
                <div class="col-12">
                    <h1>
                        Admin dashboard
                    </h1>
                    <ul>
                        <li>
                            Nome: {{ $user['name'] }}
                        </li>
                        <li>
                            Email: {{ $user['email'] }}
                        </li>
                        <li>
                            Creato: {{ $user['created_at'] }}
                        </li>
                        <li>
                            Modificato: {{ $user['updated_at'] }}
                        </li>
                    </ul>
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">
                        Go to projects management
                    </a>
                    <a href="{{ route('types.index') }}" class="btn btn-primary">
                        Go to project types management
                    </a>
                    <a href="{{ route('technologies.index') }}" class="btn btn-primary">
                        Go to project technologies management
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection