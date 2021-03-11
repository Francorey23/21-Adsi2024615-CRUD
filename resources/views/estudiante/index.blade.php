@extends('plantillaweb')
    @section('seccionuno')
        <table class="table table-success table-striped">
        
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($vrdatosEstudiante as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->nombres}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->fecha_nacimiento}}</td>
            <td><img class="img-fluid" src="{{asset($item->foto)}}" alt="" width="90">  </td>
            <td><a href="{{url('/estudiantes/'.$item->id.'/edit')}}"> <button type="button" class="btn btn-warning btn-sm">Editar</button></a>
            <td> <form action="{{route('estudiantes.destroy', $item)}}" class="d-inline" method="POST"> 
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form></td>
        </tr>
          
      @endforeach
    </tbody>
</table>
    @endsection