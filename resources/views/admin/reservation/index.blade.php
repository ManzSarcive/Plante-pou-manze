@extends('layouts.admin')

@section('content')

<a class="btn btn-primary mt-4 mb-4" href="{{route ('admin.reservations.create')}}" role="button">Ajouter une reservation</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Numéro de tel</th>
      <th scope="col">Date</th>
      <th scope="col">Panier</th>
      
    </tr>
  </thead>
  <tbody>
@foreach ($reservations as $reservation)




    <tr>
      <td>{{$reservation->first_name}} {{$reservation->last_name}}</td>
      <td>{{$reservation->email}}</td>
      <td>{{$reservation->tel_number}}</td>
      <td>{{$reservation->res_date}}</td>
      <td>{{$reservation->panier->name }}</td>
      
    </tr>
    

    @endforeach
  </tbody>
</table>
@endsection