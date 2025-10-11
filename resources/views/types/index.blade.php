@extends('layouts.types')

@section('title', 'Project Types Management')

@section('content')
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>
                        Project Types Management
                    </h1>
                    <div class="d-flex gap-1 my-3">
                        <a href="{{ route('types.create') }}" class="btn btn-success">
                            Create New Project type
                        </a>
                        <a href="{{ route('admin.index') }}" class="btn btn-primary">
                            Back to Admin Dashboard
                        </a>
                    </div>

                    @if ($types->isEmpty())
                        <div class="alert alert-info">
                            No project types found.
                        </div>
                    @else
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        Type name
                                    </th>
                                    <th>
                                        Type description
                                    </th>
                                    <th>
                                        Associated projects
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <td>
                                            #{{ $type->id }} {{ $type->name }}
                                        </td>
                                        <td>
                                            {{ $type->description }}
                                        </td>
                                        <td>
                                            @if ($type->projects->isEmpty())
                                                <span>No associated projects</span>
                                            @else
                                                @php
                                                    $type->projects = $type->projects->sortBy('id');
                                                @endphp
                                                @foreach ($type->projects as $project)
                                                    <p class='m-0'>
                                                        {{ $project->id }} - {{ $project->title }}
                                                    </p>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column gap-1">
                                                <a href="{{ route('types.show', $type) }}" class="btn btn-primary">
                                                    View
                                                </a>
                                                <a href="{{ route('types.edit', $type) }}" class="btn btn-warning">
                                                    Edit
                                                </a>
                                                
                                                {{-- Componente utilizzato con include (perchè nessun elemento variabile nel componente, provare anche con x-component per dati da passare) --}}
                                                @include('components.delete-type-button')
                                                @include('components.delete-type-modal')
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