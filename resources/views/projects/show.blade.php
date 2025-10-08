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

                    {{-- Componente utilizzato con inclue (perchè nessun elemento variabile nel componente, provare anche con x-component per dati da passare) --}}
                    @include('components.delete-project-modal')


                </div>

                <ul>
                    <li>
                        <strong>Titolo:</strong> {{ $project->title }}
                    </li>
                    <li>
                        <strong>Autore:</strong> {{ $project->author }}
                    </li>
                    <li>
                        <strong>Categoria:</strong> {{ $project->category }}
                    </li>
                    <li>
                        <strong>Contenuto:</strong>
                        <br />
                        {{ $project->content }}
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