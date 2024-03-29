@extends('layouts.app')

@section('content')
<div class="container">
@include('helpers.flash-messages')
  <div class="row">
    <div class="col-6">
      <h1><i class="fa-solid fa-user"></i> {{__('shop.user.index_title')}}</h1>
    </div>
  </div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">E-mail</th>
      <th scope="col">Imię</th>
      <th scope="col">Nazwisko</th>
      <th scope="col">Numer telefonu</th>
      <th scope="col">Akcje</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->email}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->surname}}</td>
      <td>{{$user->phone_number}}</td>
      <td>
        <a href="{{route('users.edit', $user->id)}}">
            <button class="btn btn-success btn-sm">
              <i class="fa-solid fa-pen-to-square"></i>
            </button>
        </a>
        <button class="btn btn-danger btn-sm delete" data-id="{{$user->id}}">
        <i class="fa-solid fa-trash"></i>
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $users->links() }}
</div>
@endsection
@section('javascript')
$(function() {
    $('.delete').click(function(){
      Swal.fire({
        title: 'Czy na pewno chcesz usunąć rekord?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Tak',
        cancelButtonText: 'Nie'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            method:"DELETE",
            url: "{{url('users')}}/" + $(this).data("id"),
          })
          .done(function(data){
          window.location.reload();
          })
          .fail(function(data){
          Swal.fire('Oops...',data.responseJSON.message, data.responseJSON.status)
          }) 
        }
      })
    });
});
@endsection