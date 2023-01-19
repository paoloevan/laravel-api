@extends('layouts.app')

@section('content')
    <div class="d-flex">
        @include('admin.partials.navbar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <h2 class="mb-5">Project "{{ $project->title }}"</h2>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Technologies</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Team</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->type ? $project->type->name : 'Untyped' }}</td>
                            <td>
                                @if (count($project->technologies) > 0)
                                    @foreach ($project->technologies as $technology)
                                        <div>{{ $technology->name }}</div>
                                    @endforeach
                                @else
                                    <div>No technologies associated</div>
                                @endif
                            </td>
                            <td>
                                <img width="100" src="{{ asset('storage/' . $project->cover_image) }}"
                                    alt="{{ $project->title }}">
                            </td>
                            <td>{{ $project->team }}</td>
                            <td>{{ $project->duration }}</td>
                            <td>{{ $project->description }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
