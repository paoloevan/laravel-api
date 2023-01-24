@extends('layouts.app')

@section('content')
    <div class="d-flex">
        @include('admin.partials.navbar')

        <div class="col">
            <h1 class="ms-5">Create new projects</h1>

            <form action="{{ route('admin.projects.store') }}" method="POST" class="mb-3 p-5" enctype="multipart/form-data">
                @csrf
                @include('admin.partials.error')

                <label for="title" class="form-label">Title</label>
                <small class="form-text text-muted ms-2">Required - Max 255 characters</small>
                <input value="{{ old('title') }}" type="text" name="title" id="title"
                    class="form-control mb-3 @error('title') is-invalid @enderror" aria-describedby="helpId">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- select Type -->
                <div class="mb-3">
                    <label for="type_id" class="form-label">Types</label>
                    <select class="form-select form-select-sm @error('type_id') 'is-invalid' @enderror" name="type_id"
                        id="type_id">
                        <option value="" selected>Select one</option>

                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id') ? 'selected' : '' }}>{{ $type->name }}
                            </option>
                        @endforeach

                    </select>
                </div>
                @error('type_id')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror

                <!-- select Technologies -->
                <div class="mb-3">
                    <label for="technologies" class="form-label">Technologies</label>
                    <select multiple class="form-select form-select-sm" name="technologies[]" id="technologies">
                        <option value="" disabled>Select a technology</option>
                        @forelse ($technologies as $technology)
                            @if ($errors->any())
                                <option value="{{ $technology->id }}"
                                    {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>
                                    {{ $technology->name }}</option>
                            @else
                                <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                            @endif
                        @empty
                            <option value="" disabled>No technologies in the system</option>
                        @endforelse
                    </select>
                </div>

                <label for="cover_image" class="form-label">Image</label>
                <small class="form-text text-muted ms-2">Upload cover image - max 512 Kb</small>
                <input type="file" name="cover_image" id="cover_image"
                    class="form-control mb-3 @error('cover_image') is-invalid @enderror" aria-describedby="helpId">
                @error('cover_image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <label for="team" class="form-label">Team</label>
                <small class="form-text text-muted ms-2">Max 255 characters</small>
                <input value="{{ old('team') }}" type="text" name="team" id="team"
                    class="form-control mb-3 @error('team') is-invalid @enderror" aria-describedby="helpId">
                @error('team')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <label for="duration" class="form-label">Duration</label>
                <small class="form-text text-muted ms-2">Max 255 characters</small>
                <input value="{{ old('duration') }}" type="text" name="duration" id="duration"
                    class="form-control mb-3 @error('duration') is-invalid @enderror" aria-describedby="helpId">
                @error('duration')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <label for="description" class="form-label">Description</label>
                <input value="{{ old('description') }}" type="text" name="description" id="description"
                    class="form-control mb-3" aria-describedby="helpId">

                <label for="project_url" class="form-label">Project url</label>
                <input value="{{ old('project_url') }}" type="text" name="project_url" id="project_url"
                    class="form-control mb-3 @error('project_url') is-invalid @enderror" aria-describedby="helpId">
                @error('project_url')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <label for="source_code" class="form-label">Source code</label>
                <input value="{{ old('source_code') }}" type="text" name="source_code" id="source_code"
                    class="form-control mb-3 @error('source_code') is-invalid @enderror" aria-describedby="helpId">
                @error('source_code')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <input class="btn btn-primary mt-2" type="submit">

            </form>
        </div>
    </div>
@endsection
