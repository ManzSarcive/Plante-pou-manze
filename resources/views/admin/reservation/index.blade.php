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
      <td> <a href="{{ route('admin.reservations.edit', $reservation->id) }}"><i class="fa-solid fa-pencil"></i></a>
        <form method="POST" action="{{ route('admin.reservations.destroy', $reservation->id) }}" onsubmit="return confirm('Etes vous sure');">
          @csrf
          @method('DELETE')
          <button type="submit"><i class="fa-solid fa-trash-can"></i></button>

        </form>
      </td>
      
    </tr>
    

    @endforeach
  </tbody>
</table>
@endsection