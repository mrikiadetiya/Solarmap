@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Regions</h1>
        <a href="{{ route('admin.regions.create') }}" class="btn btn-primary mb-3">Create Region</a>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regions as $region)
                    <tr>
                        <td>{{ $region->name }}</td>
                        <td>{{ $region->latitude }}</td>
                        <td>{{ $region->longitude }}</td>
                        <td>
                            <a href="{{ route('admin.regions.edit', $region) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.regions.destroy', $region) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
