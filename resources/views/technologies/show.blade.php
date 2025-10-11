@extends('layouts.technologies')

@section('title', 'Project Technology Details #' . $technology->id)

@section('content')
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Project Technology #{{ $technology->id }}
                </h1>

                <div class="d-flex gap-1 my-3">
                    <a href="{{ route('technologies.index') }}" class="btn btn-primary">
                        Back to All Project Technologies
                    </a>
                    <a href="{{ route('technologies.edit', $technology) }}" class="btn btn-warning">
                        Edit project technology
                    </a>

                    {{-- Componente utilizzato con include (perchè nessun elemento variabile nel componente, provare anche con x-component per dati da passare) --}}
                    @include('components.delete-technology-button')
                    @include('components.delete-technology-modal')
                </div>
                <ul>
                    <li>
                        <strong>Technology name:</strong> {{ $technology->name }}
                    </li>
                    <li>
                        <strong>Technology color:</strong>
                        <br/>
                        <span class="badge" style="background-color: {{ $technology->color }}">{{ $technology->color }}</span> 
                    </li>
                    <li>
                        <strong>Associated Projects:</strong>
                        <br/>
                        @if ($technology->projects->isEmpty())
                            <span>No associated projects</span>
                        @else
                            @php
                                $technology->projects = $technology->projects->sortBy('id');
                            @endphp
                            @foreach ($technology->projects as $project)
                                {{-- <a href="{{ route('projects.show', $project) }}" class="badge text-bg-info">
                                    {{ $project->title }}
                                </a> --}}
                                <p class='m-0'>
                                    {{ $project->id }} - {{ $project->title }}
                                </p>
                            @endforeach
                        @endif
                    </li>
                    <li>
                        <strong>Creato:</strong> {{ $technology->created_at }}
                    </li>
                    <li>
                        <strong>Modificato:</strong> {{ $technology->updated_at }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection