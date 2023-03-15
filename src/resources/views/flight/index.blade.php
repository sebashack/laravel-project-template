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
        <p> Type: {{ $flight->getType() }}</p>
        <p> Price: ${{ $flight->getPrice() }}</p>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
