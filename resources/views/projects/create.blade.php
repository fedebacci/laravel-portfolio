@extends('layouts.projects')

@section('title', 'Create New Admin Project')

@section('content')

<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    New Project
                </h1>

                <form action="{{ route('projects.store') }}" method="POST">

                    {{-- token --}}
                    @csrf

                    <label for="title">
                        Titolo del progetto
                    </label>
                    <input type="text" name="title" id="title" class="form-control mb-2" required>

                    <label for="author">
                        Autore del progetto
                    </label>
                    <input type="text" name="author" id="author" class="form-control mb-2" required>

                    <label for="category">
                        Categoria del progetto
                    </label>
                    <input type="text" name="category" id="category" class="form-control mb-2" required>

                    <label for="content">
                        Descrizione del progetto
                    </label>
                    <textarea name="content" id="content" class="form-control mb-2" required></textarea>

                    <input type="submit" value="Crea Progetto" class="btn btn-success">

                </form>

            </div>
        </div>
    </div>
</section>

@endsection