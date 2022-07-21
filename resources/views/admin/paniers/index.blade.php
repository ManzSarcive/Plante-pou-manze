@extends('layouts.admin')

@section('content')

<a class="btn btn-primary mt-4 mb-4 " href="{{route ('admin.paniers.create')}}" role="button">Ajouter un panier</a>

<table class="table table-hover  ">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>



    </tr>
  </thead>
  <tbody>
    @foreach ($paniers as $panier)


    <tr>
      <td> {{ $panier->name }} </td>
      <td><img style="width: 100px;" class="" img-fluid"" src="{{ Storage::url($panier->image) }}"></td>
      <td>{{ $panier->description }} </td>
      <td>{{ $panier->price }}</td>
      <td>{{ $panier->status->name }}</td>
      {{-- <td>{{ $panier->status->name }}</td> --}}
      <td> <a href="{{ route('admin.paniers.edit', $panier->id) }}"><i class="fa-solid fa-pencil"></i></a>
        <form method="POST" action="{{ route('admin.paniers.destroy', $panier->id) }}" onsubmit="return confirm('Etes vous sure');">
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





<!-- <style>
  .btn1{
      height: 20%;
      width: 50%;
  }
</style> -->