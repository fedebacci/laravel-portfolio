@extends('layouts.technologies')

@section('title', 'Edit Project Technology #' . $technology->id)

@section('content')
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Edit Project Technology #{{ $technology->id }}
                </h1>
                <div class="d-flex gap-1 my-3">
                    <a href="{{ route('technologies.index') }}" class="btn btn-primary">
                        Back to All Project Technologies
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

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('technologies.update', $technology) }}" method="POST" class="row g-3">
                            {{-- token --}}
                            @csrf
                            {{-- metodo PUT --}}
                            @method('PUT')
                            <div class="col-12">
                                <label for="name">
                                    Technology Name
                                </label>
                                <input type="text" name="name" id="name" class="form-control mb-2" required pattern="\S(.*\S)?" value="{{ old('name', $technology->name) }}">
                            </div>
                            <div class="col-12">
                                <label for="color">
                                    Technology Color
                                </label>
                                {{-- <input type="color" name="color" id="color" value="{{ old('color', $technology->color) }}"> --}}
                                <input type="color" name="color" id="color" value="{{ $technology->color }}" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">
                                    Update Project Technology
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection