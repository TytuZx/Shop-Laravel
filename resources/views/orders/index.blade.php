@extends('layouts.app')

@section('content')
<div class="container">
  @include('helpers.flash-messages')
  <div class="row">
    <div class="col-6">
    <h1><i class="fa-solid fa-clipboard"></i> Zamówienia</h1>
    </div>
  </div>
  <div class="row">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">ID_Zamówienia</th>
          <th scope="col">Ilość</th>
          <th scope="col">Cena  [PLN]</th>
          <th scope="col">Produkty</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
        <tr>
          <td>{{$order->id}}</td>
          <td>{{$order->quantity}}</td>
          <td>{{$order->price}}</td>
          <td>
          @foreach($order->products as $product)
            <ul>
              <li>{{$product->name}} - {{$product->description}}</li>
            </ul>
          @endforeach
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $orders->links() }}
  </div>
</div>
@endsection