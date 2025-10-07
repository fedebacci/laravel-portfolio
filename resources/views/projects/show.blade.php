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
            </div>
        </div>
    </div>
</section>

@endsection