@extends('layouts.admin')

@section('content')
<div class="container">
  <form method="POST" action="{{ route('admin.reservations.update', $reservation->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="first_name" class="form-label">First Name</label>
      <input type="text" id="first_name" name="first_name" value="{{ $reservation->first_name }}">

    </div>

    @error('first_name')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="last_name" class="form-label">Last Name</label>
      <input type="text" id="last_name" name="last_name" value="{{ $reservation->last_name }}">

    </div>

    @error('last_name')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <!-- <div class="mb-3">
  <label for="image" class="form-label">Image</label>
  <input type="file" id="image" name="image">
</div> -->

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" id="email" name="email" value="{{ $reservation->email }}">

    </div>

    @error('email')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="tel_number" class="form-label">Phone number</label>
      <input type="text" id="tel_number" name="tel_number" value="{{ $reservation->tel_number }}">

    </div>

    @error('tel_number')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="res_date" class="form-label">Reservation Date</label>
      <input type="datetime-local" id="res_date" name="res_date" value="{{ $reservation->res_date->format('Y-m-d\TH:i:s') }}">

    </div>

    @error('res_date')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <div>
      <label for="status">Panier</label>
      <div>
        <select id="panier_id" name="panier_id">
          @foreach ($paniers as $panier)
          <option value="{{ $panier->id }} @selected($panier->id == $reservation->panier_id)">{{$panier->name}}</option>
          @endforeach
        </select>
      </div>
      @error('panier_id')
      <div class="text-sm text-danger">{{ $message }}</div>
      @enderror
    </div>


    <button type="submit" class="btn btn-primary">Modifier</button>
  </form>
</div>

@endsection