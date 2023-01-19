@extends('layouts.app')

@section('content')
    <div class="d-flex">
        @include('admin.partials.navbar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex mb-3">
                <h2>Projects</h2>

                <a class="bg-primary text-white btn btn-sm p-1 ms-5" href="{{ route('admin.projects.create') }}">
                    <div>Add new project</div>
                    <div>+</div>
                </a>

            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Actions</th>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Technologies</th>
                            <th scope="col">Team</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    <a class="p-1 my-1 btn btn-dark btn-sm"
                                        href="{{ route('admin.projects.show', $project->slug_title) }}">Show</a>
                                    <a class="p-1 my-1 btn btn-secondary btn-sm"
                                        href="{{ route('admin.projects.edit', $project->slug_title) }}">Edit</a>

                                    @include('admin.partials.modal')

                                </td>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->type ? $project->type->name : 'Untyped' }}</td>
                                <td>
                                    @if (count($project->technologies) > 0)
                                        @foreach ($project->technologies as $technology)
                                            <div>{{ $technology->name }}</div>
                                        @endforeach
                                    @else
                                        <div>No technologies</div>
                                    @endif
                                </td>
                                <td>{{ $project->team }}</td>
                                <td>{{ $project->duration }}</td>
                                <td>{{ $project->description }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
