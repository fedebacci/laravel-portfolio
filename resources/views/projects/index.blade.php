@extends('layouts.projects')

@section('title', 'All Admin Projects')

@section('content')

<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Admin Projects
                </h1>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>
                                Author
                            </th>
                            <th>
                                Category
                            </th>
                            {{-- <th>
                                Content
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    {{ $project->title }}
                                </td>
                                <td>
                                    {{ $project->author }}
                                </td>
                                <td>
                                    {{ $project->category }}
                                </td>
                                {{-- <td>
                                    {{ $project->content }}
                                </td> --}}
                                <td>
                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary">
                                        View Post
                                    </a>
                                    {{-- <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">
                                        Edit Post
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection