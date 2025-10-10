@extends('layouts.projects')

@section('title', 'Admin Project #' . $project->id)

@section('content')

<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Project #{{ $project->id }}
                </h1>

                <div class="d-flex gap-1 my-3">
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">
                        Back to All Projects
                    </a>
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">
                        Edit project
                    </a>

                    {{-- Componente utilizzato con include (perchè nessun elemento variabile nel componente, provare anche con x-component per dati da passare) --}}
                    @include('components.delete-project-button')
                    @include('components.delete-project-modal')


                </div>

                <ul>
                    <li>
                        <strong>Titolo:</strong> {{ $project->title }}
                    </li>
                    <li>
                        <strong>Cliente:</strong> {{ $project->client }}
                    </li>
                    <li>
                        <strong>Periodo:</strong>                                     
                        <br/>
                        <span class="text-nowrap">From: {{ substr($project->startDate, 0, 10) }}</span>
                        <br/>
                        <span class="text-nowrap">To: {{ substr($project->endDate, 0, 10) }}</span>
                    </li>
                    <li>
                        <strong>Tipo:</strong> {{ $project->type->name ?? 'No type' }}
                    </li>
                    <li>
                        <strong>Tecnologie:</strong>
                        @if ($project->technologies->isNotEmpty())
                            @foreach ($project->technologies as $technology)
                                <span class="badge" style="background-color: {{ $technology->color }}">{{ $technology->name }}</span>
                            @endforeach
                        @else
                            <span>No technologies</span>
                        @endif
                        {{-- @forelse ($collection as $item)
                        @empty
                        @endforelse --}}
                        {{-- <strong>Tecnologie:</strong> {{ $project->technology->name }} --}}
                    </li>
                    <li>
                        <strong>Contenuto:</strong>
                        <br />
                        {{-- <pre class="m-0 text-wrap">{{ $project->summary }}</pre> --}}
                        {{-- <pre class="m-0">{{ $project->summary }}</pre> --}}
                        {{ $project->summary }}
                    </li>
                    <li>
                        <strong>Creato:</strong> {{ $project->created_at }}
                    </li>
                    <li>
                        <strong>Modificato:</strong> {{ $project->updated_at }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>




@endsection