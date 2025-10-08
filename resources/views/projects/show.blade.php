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
                    
                    {{-- <a href="#" class="btn btn-danger">
                        Delete project
                    </a> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProjectModal">
                        Delete project
                    </button>


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







<!-- Modal -->
<div class="modal fade" id="deleteProjectModal" tabindex="-1" aria-labelledby="deleteProjectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteProjectModalLabel">
            Delete project
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare il progetto "{{ $project->title }}"?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
        </button>

        <form action="{{ route('projects.destroy', $project) }}" method="POST">
            {{-- token --}}
            @csrf
            {{-- method --}}
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Delete forever
            </button>
        </form>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>

@endsection