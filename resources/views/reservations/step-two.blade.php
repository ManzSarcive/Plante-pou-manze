@extends('layouts.guest')

@section('content')


<div class="mt-5 ms-5">
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
                    <form method="POST" action="{{ route('reservations.store.step.two') }}">
    @csrf
    
    <div>
      <label for="status">Panier</label>
      <div>
        <select id="panier_id" name="panier_id" class="mt-4">
          @foreach ($paniers as $panier)
          <option value="{{ $panier->id }} ">{{$panier->name}}</option>
          @endforeach
        </select>
      </div>
      @error('panier_id')
      <div class="text-sm text-danger">{{ $message }}</div>
      @enderror
    </div>

    
    
    

    

<a href="{{ route('reservations.step.one') }}">Previous</a>
    <button type="submit" class="btn btn-primary mt-4">Réserver</button>
  </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection