@extends('layouts.projects')

@section('title', 'Edit Admin Project #' . $project->id)

@section('content')

<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Edit Project #{{ $project->id }}
                </h1>

                <div class="d-flex gap-1 my-3">
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">
                        Back to All Projects
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                {{-- # IMPORTANTE --}}
                {{-- # Relativamente al recupero dei dati errati nel redirect a questa pagina (ad esempio con date incompatibili) PROVARE AD USARE old() (In fase d test per i types) --}}
                {{-- ! ES: {{ substr(old('startDate', $project->startDate), 0, 10) }} --}}
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('projects.update', $project) }}" method="POST" class="row g-3">
                            {{-- token --}}
                            @csrf
                            {{-- method --}}
                            @method('PUT')
                            <div class="col-12">
                                <label for="title">
                                    Titolo del progetto
                                </label>
                                <input value="{{ $project->title }}" type="text" name="title" id="title" class="form-control mb-2" required pattern="\S(.*\S)?">
                            </div>
                            <div class="col-12">
                                <label for="client">
                                    Cliente del progetto
                                </label>
                                <input value="{{ $project->client }}" type="text" name="client" id="client" class="form-control mb-2" required pattern="\S(.*\S)?">
                            </div>
                            {{-- # NEW with type Model (relation One to Many) -> type (New resource) --}}
                            <div class="col-12">
                                <label for="type_id">
                                    Tipologia del progetto
                                </label>
                                <select name="type_id" id="type_id" class="form-select">
                                    <option value="null">Choose type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="d-block">
                                    Tecnologie usate
                                </label>
                                @foreach ($technologies as $technology)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="technology-{{ $technology->id }}" value="{{ $technology->id }}" name="technologies[]" {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-6">
                                <label for="startDate">
                                    Inizio del progetto
                                </label>
                                <input value="{{ substr($project->startDate, 0, 10) }}" type="date" name="startDate" id="startDate" class="form-control mb-2" required max="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-6">
                                <label for="endDate">
                                    Fine del progetto
                                </label>
                                <input value="{{ substr($project->endDate, 0, 10) }}" type="date" name="endDate" id="endDate" class="form-control mb-2" required max="{{ date('Y-m-d') }}">
                            </div>


                            <div class="col-12">
                                <label for="summary">
                                    Riassunto del progetto
                                </label>
                                <textarea name="summary" id="summary" class="form-control mb-2" required pattern="\S(.*\S)?">{{ $project->summary }}</textarea>
                            </div>
                            <div class="col-12"><input type="submit" value="Modifica Progetto" class="btn btn-success"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection