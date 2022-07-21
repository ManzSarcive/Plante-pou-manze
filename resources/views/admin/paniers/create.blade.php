@extends('layouts.admin')

@section('content')
<div class="container">
  <form method="POST" action="{{ route('admin.paniers.index') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" id="name" name="name" class="@error('name') text-danger @enderror">

    </div>
    @error('name')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="file" id="image" name="image">
    </div>
    @error('image')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" rows="3"></textarea>
    </div>

    @error('description')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" id="price" name="price">

    </div>

    @error('price')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <div>
      <label for="status">Status</label>
      <div>
        <select class="form-label" id="status" name="status">
          @foreach (App\Enums\PanierStatus::cases() as $status)

          
          <option value="{{ $status->value }}">{{ $status->name }}</option>
          @endforeach
        </select>
      </div>
      @error('panier_id')
      <div class="text-sm text-danger">{{ $message }}</div>
      @enderror
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection