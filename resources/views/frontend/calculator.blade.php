@extends('layouts.frontend')

@section('content')
    <div class="container">
        <h1>Solar Panel Calculator</h1>
        <form action="{{ route('calculator.calculate') }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-3">
                <label for="electricity_consumption" class="form-label">Monthly Electricity Consumption (kWh)</label>
                <input type="number" class="form-control" id="electricity_consumption" name="electricity_consumption" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>

        @if(isset($results))
            <h2>Calculation Results</h2>
            <div class="card">
                <div class="card-body">
                    <p>Number of panels needed: {{ $results['number_of_panels'] }}</p>
                    <p>Estimated electricity production: {{ $results['electricity_production'] }} kWh/month</p>
                    <p>Estimated cost: ${{ number_format($results['cost_estimation'], 2) }}</p>
                </div>
            </div>
        @endif
    </div>
@endsection
