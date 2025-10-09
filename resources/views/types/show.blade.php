@extends('layouts.types')

@section('title', 'Project Type Details #' . $type->id)

@section('content')
<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Project Type #{{ $type->id }}
                </h1>

                <div class="d-flex gap-1 my-3">
                    <a href="{{ route('types.index') }}" class="btn btn-primary">
                        Back to All Project Types
                    </a>
                    <a href="{{ route('types.edit', $type) }}" class="btn btn-warning">
                        Edit project type
                    </a>

                    {{-- Componente utilizzato con include (perchè nessun elemento variabile nel componente, provare anche con x-component per dati da passare) --}}
                    @include('components.delete-type-button')
                    @include('components.delete-type-modal')
                </div>
                <ul>
                    <li>
                        <strong>Type name:</strong> {{ $type->name }}
                    </li>
                    <li>
                        <strong>Type description:</strong>
                        <br/>
                        {{ $type->description ?? 'No description' }}
                    </li>
                    <li>
                        <strong>Creato:</strong> {{ $type->created_at }}
                    </li>
                    <li>
                        <strong>Modificato:</strong> {{ $type->updated_at }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection