@extends('layouts.frontend')

@section('content')

<h2 class="text-xl font-bold mb-4">Kalkulator Panel Surya</h2>

<form method="POST" action="/calculate" class="bg-white p-4 rounded shadow">
    @csrf

    <label>Kebutuhan Listrik (kWh)</label>
    <input type="number" name="energy" class="w-full border p-2 mb-4">

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Hitung
    </button>
</form>

@endsection