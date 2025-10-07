@extends('layouts.master')

@section('title', 'Admin Projects')

@section('content')

<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Admin Projects
                </h1>
                <ul>
                    @foreach ($projects as $project)
                    <li>
                        Titolo: {{ $project->title }} - Autore: {{ $project->author }} - Categoria: {{ $project->category }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection