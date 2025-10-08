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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('projects.store') }}" method="POST" class="row g-3">
                            {{-- token --}}
                            @csrf
                            <div class="col-12">
                                <label for="title">
                                    Titolo del progetto
                                </label>
                                <input type="text" name="title" id="title" class="form-control mb-2" required pattern="\S(.*\S)?">
                            </div>
                            <div class="col-12">
                                <label for="client">
                                    Cliente del progetto
                                </label>
                                <input type="text" name="client" id="client" class="form-control mb-2" required pattern="\S(.*\S)?">
                            </div>
                            <div class="col-6">
                                <label for="startDate">
                                    Inizio del progetto
                                </label>
                                {{-- <input type="text" name="startDate" id="startDate" class="form-control mb-2" required pattern="\S(.*\S)?"> --}}
                                {{-- <input type="datetime-local" name="startDate" id="startDate" class="form-control mb-2" required> --}}
                                {{-- <input type="date" name="startDate" id="startDate" class="form-control mb-2" required max="{{ date('d-m-Y') }}"> --}}
                                <input type="date" name="startDate" id="startDate" class="form-control mb-2" required max="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-6">
                                <label for="endDate">
                                    Fine del progetto
                                </label>
                                {{-- <input type="text" name="endDate" id="endDate" class="form-control mb-2" required pattern="\S(.*\S)?"> --}}
                                {{-- <input type="datetime-local" name="endDate" id="endDate" class="form-control mb-2" required> --}}
                                {{-- <input type="date" name="endDate" id="endDate" class="form-control mb-2" required max="{{ date('d-m-Y') }}"> --}}
                                <input type="date" name="endDate" id="endDate" class="form-control mb-2" required max="{{ date('Y-m-d') }}">
                            </div>
                            {{-- <div class="col-12">
                                <label for="type">
                                    Tipologia del progetto
                                </label>
                                <input type="text" name="type" id="type" class="form-control mb-2" required pattern="\S(.*\S)?">
                            </div> --}}
                            <div class="col-12">
                                <label for="summary">
                                    Riassunto del progetto
                                </label>
                                <textarea name="summary" id="summary" class="form-control mb-2" required pattern="\S(.*\S)?"></textarea>
                            </div>
                            <div class="col-12"><input type="submit" value="Create Project" class="btn btn-success"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection