@extends('layouts.projects')

@section('title', 'All Admin Projects')

@section('content')

<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Admin Projects
                </h1>

                <div class="d-flex gap-1 my-3">
                    <a href="{{ route('projects.create') }}" class="btn btn-success">
                        Create New Project
                    </a>
                    <a href="{{ route('admin.index') }}" class="btn btn-primary">
                        Back to Admin Dashboard
                    </a>
                </div>

                @if ($projects->isEmpty())
                    <div class="alert alert-info">
                        No projects found.
                    </div>
                @else
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Client
                                </th>
                                <th>
                                    Period
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Technologies
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>
                                        #{{ $project->id }} {{ $project->title }}
                                    </td>
                                    <td>
                                        {{ $project->client }}
                                    </td>
                                    <td>
                                        <span class="text-nowrap">From: {{ substr($project->startDate, 0, 10) }}</span>
                                        <br/>
                                        <span class="text-nowrap">To: {{ substr($project->endDate, 0, 10) }}</span>
                                    </td>
                                    <td>
                                        {{ $project->type->name ?? 'No type' }}
                                    </td>
                                    <td>
                                        @if ($project->technologies->isNotEmpty())
                                            @php
                                                $project->technologies = $project->technologies->sortBy('id');
                                            @endphp
                                            @foreach ($project->technologies as $technology)
                                                <span class="badge {{ $technology->name == 'JavaScript' || $technology->name == 'React' ? 'text-dark' : 'text-light' }}" style="background-color: {{ $technology->color }}">{{ $technology->name }}</span>
                                            @endforeach
                                        @else
                                            <span>No technologies</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column gap-1">
                                            <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">
                                                View
                                            </a>
                                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">
                                                Edit
                                            </a>
                                            
                                            {{-- Componente utilizzato con include (perchè nessun elemento variabile nel componente, provare anche con x-component per dati da passare) --}}
                                            @include('components.delete-project-button')
                                            @include('components.delete-project-modal')
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</section>


@endsection