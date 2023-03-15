@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create product</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('flight.save') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('price') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter type (local or international)" name="type" value="{{ old('type') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price') }}" />
              <input type="submit" class="btn btn-primary" value="Create" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
