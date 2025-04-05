@extends('layouts.app')

@section('content')
<div class="card mt-5">
  <div class="card-header">
    <h4>Create Product</h4>
  </div>
  <div class="card-body">
    <a href="{{ route('products.index') }}" class="btn btn-info btn-sm mb-3"><i class="fa fa-arrow-left"></i> Back</a>

    <form action="{{ route('products.store') }}" method="post">
        @csrf

        <div class="mt-2">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Name" class="form-control">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-2">
            <label for="details">Details:</label>
            <textarea id="details" name="details" placeholder="Details" class="form-control"></textarea>
            @error('details')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-2">
            <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Submit</button>
        </div>
    </form>
  </div>
@endsection