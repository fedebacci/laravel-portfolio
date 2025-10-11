@extends('layouts.technologies')

@section('title', 'Project Technologies Management')

@section('content')
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>
                        Project Technologies Management
                    </h1>
                    <div class="d-flex gap-1 my-3">
                        <a href="{{ route('technologies.create') }}" class="btn btn-success">
                            Create New Project technology
                        </a>
                        <a href="{{ route('admin.index') }}" class="btn btn-primary">
                            Back to Admin Dashboard
                        </a>
                    </div>

                    @if ($technologies->isEmpty())
                        <div class="alert alert-info">
                            No project technologies found.
                        </div>
                    @else
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        Technology name
                                    </th>
                                    <th>
                                        Technology color
                                    </th>
                                    <th>
                                        Associated projects
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($technologies as $technology)
                                    <tr>
                                        <td>
                                            #{{ $technology->id }} {{ $technology->name }}
                                        </td>
                                        <td>
                                            <span class="badge {{ $technology->name == 'JavaScript' || $technology->name == 'React' ? 'text-dark' : 'text-light' }}" style="background-color: {{ $technology->color }}">{{ $technology->color }}</span> 
                                        </td>
                                        <td>
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
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column gap-1">
                                                <a href="{{ route('technologies.show', $technology) }}" class="btn btn-primary">
                                                    View
                                                </a>
                                                <a href="{{ route('technologies.edit', $technology) }}" class="btn btn-warning">
                                                    Edit
                                                </a>
                                                
                                                {{-- Componente utilizzato con include (perchè nessun elemento variabile nel componente, provare anche con x-component per dati da passare) --}}
                                                @include('components.delete-technology-button')
                                                @include('components.delete-technology-modal')
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