@extends('layouts.guest')

@section('content')
@foreach ($paniers as $panier)
<div class="card " style="width: 18rem;">
  <img src="{{ Storage::url($panier->image) }}" class="card-img-top" alt="...">
  <div class="card-body">
  <a href="{{ route('paniers.show', $panier->id) }}">    <h5 class="card-title text-decoration-none">{{ $panier->name}}</h5>
</a>

</div>
</div>
@endforeach


@endsection 