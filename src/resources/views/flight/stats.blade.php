@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-center">
    <h3>Flight statistics</h3>
    <p>International flights: {{ $viewData['num_international'] }}</p>
    <p>Local flights: {{ $viewData['num_local'] }}</p>
    <p>Average local flight price: ${{ $viewData['average_local_price'] }}</p>
</div>
@endsection
