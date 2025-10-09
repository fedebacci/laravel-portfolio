@extends('layouts.types')

@section('title', 'Edit Project Type #' . $type->id)

@section('content')
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Edit Project Type #{{ $type->id }}
                </h1>
                <div class="d-flex gap-1 my-3">
                    <a href="{{ route('types.index') }}" class="btn btn-primary">
                        Back to All Project Types
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
                        <form action="{{ route('types.update', $type) }}" method="POST" class="row g-3">
                            {{-- token --}}
                            @csrf
                            {{-- metodo PUT --}}
                            @method('PUT')
                            <div class="col-12">
                                <label for="name">
                                    Type Name
                                </label>
                                <input type="text" name="name" id="name" class="form-control mb-2" required pattern="\S(.*\S)?" value="{{ old('name', $type->name) }}">
                            </div>
                            <div class="col-12">
                                <label for="description">
                                    Type Description
                                </label>
                                <textarea name="description" id="description" rows="5" class="form-control mb-2" pattern="\S(.*\S)?">{{ old('description', $type->description) }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">
                                    Update Project Type
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