@extends('layouts.app')

@section('content')
<div class="container">
  @include('helpers.flash-messages')
  <div class="row">
    <div class="col-6">
    <h1><i class="fa-solid fa-clipboard"></i> {{__('shop.product.index_title')}}</h1>
    </div>
    <div class="col-6 ">
      <a class="float-end" href="{{ route('products.create') }}">
        <button type="button" class="btn btn-primary"><i class="fa-regular fa-square-plus"></i> {{__('shop.button.add')}}</button>
      </a>
    </div>
  </div>
  <div class="row">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">{{__('shop.product.fields.name')}}</th>
          <th scope="col">{{__('shop.product.fields.description')}}</th>
          <th scope="col">{{__('shop.product.fields.amount')}}</th>
          <th scope="col">{{__('shop.product.fields.price')}}</th>
          <th scope="col">{{__('shop.product.fields.category')}}</th>
          <th scope="col">{{__('shop.columns.actions')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <th scope="row">{{$product->id}}</th>
          <td>{{$product->name}}</td>
          <td>{{$product->description}}</td>
          <td>{{$product->amount}}</td>
          <td>{{$product->price}}</td>
          <td>@if($product->hasCategory()){{$product->category->name}}@endif</td>
          <td>
            <a href="{{route('products.show', $product->id)}}">
              <button class="btn btn-primary btn-sm">
              <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </a>

            <a href="{{route('products.edit', $product->id)}}">
              <button class="btn btn-success btn-sm">
              <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </a>
            <button class="btn btn-danger btn-sm delete" data-id="{{$product->id}}">
            <i class="fa-solid fa-trash"></i>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $products->links() }}
  </div>
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
url: "{{url('products')}}/" + $(this).data("id"),
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