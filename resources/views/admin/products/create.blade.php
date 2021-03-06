@extends('layouts.admin')

@section('content')
<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" id="name" name="name">

</div>

<div class="mb-3">
  <label for="image" class="form-label">Image</label>
  <input type="file" id="image" name="image">
</div>

<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea name="description" id="description" rows="3"></textarea>
</div>

<div class="mb-3">
  <label for="description" class="form-label">Paniers</label>
  <div>
    <select multiple>
      @foreach($paniers as $panier)
      <option>{{ $panier->name }}</option>

      @endforeach
    </select>
  </div>
</div>

<div class="mb-3">
  <label for="price" class="form-label">Price</label>
  <input type="number" id="price" name="price">

</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection