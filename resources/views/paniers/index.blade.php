@extends('layouts.guest')

@section('content')

<div class="container">
    <div class="row mt-5">
        @foreach ($paniers as $panier)
        <div class="col">

            <div class="card" style="width: 18rem;">
                <img src="{{ Storage::url($panier->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $panier->name}}</h5>
                    <p class="card-text">{{ $panier->description}}</p>
                    <p class="card-text">{{ $panier->price}}</p>
                    <a href="{{ route('reservations.step.one') }}" class="btn btn-primary">Réserver</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>



@endsection