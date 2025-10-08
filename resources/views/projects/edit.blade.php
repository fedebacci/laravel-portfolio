@extends('layouts.projects')

@section('title', 'Create New Admin Project')

@section('content')

<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Edit Project #{{ $project->id }}
                </h1>

                <form action="{{ route('projects.update', $project) }}" method="POST">

                    {{-- token --}}
                    @csrf
                    {{-- method --}}
                    @method('PUT')

                    <label for="title">
                        Titolo del progetto
                    </label>
                    <input value="{{ $project->title }}" type="text" name="title" id="title" class="form-control mb-2">

                    <label for="author">
                        Autore del progetto
                    </label>
                    <input value="{{ $project->author }}" type="text" name="author" id="author" class="form-control mb-2">

                    <label for="category">
                        Categoria del progetto
                    </label>
                    <input value="{{ $project->category }}" type="text" name="category" id="category" class="form-control mb-2">

                    <label for="content">
                        Descrizione del progetto
                    </label>
                    <textarea name="content" id="content" class="form-control mb-2">{{ $project->content }}</textarea>

                    <input type="submit" value="Modifica Progetto" class="btn btn-success">

                </form>

            </div>
        </div>
    </div>
</section>

@endsection