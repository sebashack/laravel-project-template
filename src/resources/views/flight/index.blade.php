@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="row">
  @foreach ($viewData["flights"] as $flight)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <h3>Flight {{ $flight->getId() }}</h3>
        <p> Name: {{ $flight->getName() }}</p>
        @if($flight->getType() === 'local')
        <p> Type: {{ $flight->getType() }}</p>
        <p style="color:blue;">Price: ${{ $flight->getPrice() }}</p>
        @else
        <strong>Price: ${{ $flight->getPrice() }}</strong>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
