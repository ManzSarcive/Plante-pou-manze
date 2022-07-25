@extends('layouts.guest')

@section('content')
<div>
    <div class="text-center">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/image/panier.jpeg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Faite votre réservation</h5>
                    </div>
                    <form method="POST" action="{{ route('reservations.store.step.one') }}">
    @csrf
    
    <div class="mb-3">
      <label for="first_name" class="form-label">First Name</label>
      <input type="text" id="first_name" name="first_name" value="{{ $reservation->first_name ?? ''}}">

    </div>

    @error('first_name')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="last_name" class="form-label">Last Name</label>
      <input type="text" id="last_name" name="last_name" value="{{ $reservation->last_name ?? '' }}">

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
      <input type="email" id="email" name="email" value="{{ $reservation->email ?? '' }}">

    </div>

    @error('email')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="tel_number" class="form-label">Phone number</label>
      <input type="text" id="tel_number" name="tel_number" value="{{ $reservation->tel_number ?? '' }}">

    </div>

    @error('tel_number')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="res_date" class="form-label">Reservation Date</label>
      <input type="datetime-local" id="res_date" name="res_date" value="{{ $reservation->res_date ?? '' }}">

    </div>

    @error('res_date')
    <div class="text-sm text-danger">{{ $message }}</div>
    @enderror

    


    <button type="submit" class="btn btn-primary">Modifier</button>
  </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection