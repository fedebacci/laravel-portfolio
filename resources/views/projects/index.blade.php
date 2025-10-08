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

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>
                                Author
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Actions
                            </th>
                            {{-- <th>
                                Content
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    #{{ $project->id }} {{ $project->title }}
                                </td>
                                <td>
                                    {{ $project->author }}
                                </td>
                                <td>
                                    {{ $project->category }}
                                </td>
                                {{-- <td>
                                    {{ $project->content }}
                                </td> --}}
                                <td>
                                    <div class="d-flex flex-column gap-1">
                                        <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">
                                            View
                                        </a>
                                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">
                                            Edit
                                        </a>
                                        
                                        {{-- Componente utilizzato con inclue (perchè nessun elemento variabile nel componente, provare anche con x-component per dati da passare) --}}
                                        @include('components.delete-project-button')
                                        @include('components.delete-project-modal')
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


@endsection