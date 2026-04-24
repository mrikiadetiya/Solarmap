@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Edit Region</h1>
        <form action="{{ route('admin.regions.update', $region) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $region->name }}" required>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="number" step="0.000001" class="form-control" id="latitude" name="latitude" value="{{ $region->latitude }}" required>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="number" step="0.000001" class="form-control" id="longitude" name="longitude" value="{{ $region->longitude }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
