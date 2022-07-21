@extends('layouts.admin')

@section('content')
<div class="container">
<form method="POST" action="{{ route('admin.paniers.update', $panier->id) }}" enctype="multipart/form-data" >
  @csrf
  @method('PUT')
<div class="mb-3">
    <label for="name"  class="form-label">Name</label>
    <input type="text" id="name" name="name" value="{{ $panier->name }}">
   
  </div>
  @error('name')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

  <div class="mb-3">
  <label for="image" class="form-label">Image</label>
  <div>
    <img  src="{{ Storage::url($panier->image) }}" >
  </div>
  <input type="file" id="image" name="image">
</div>

@error('image')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description" rows="3">
    {{ $panier->description }}
    </textarea>
  </div>

  @error('description')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

  <div class="mb-3">
    <label for="price"  class="form-label">Price</label>
    <input type="number" id="price" name="price" value='{{ $panier->price }}' >
   
  </div>

  @error('price')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror


    <div>
      <label for="status">Status</label>
      <div>
        <select class="form-label" id="status" name="status">
          @foreach (App\Enums\PanierStatus::cases() as $status)

          
          <option value="{{ $status->value }}" @selected($panier->status->value == $status->value) >{{ $status->name }}</option>
          @endforeach
        </select>
      </div>
    </div>

  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

@endsection

