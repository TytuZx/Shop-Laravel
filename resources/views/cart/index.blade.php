@extends('layouts.app')

@section('content')
<div class="container">
  @include('helpers.flash-messages')
  <div class="cart_section">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-10 offset-lg-1">
                 <div class="cart_container">
                     <div class="cart_title">Koszyk<small> ({{$cart->getItems()->count()}}) </small></div>
                     <div class="cart_items">
                         <ul class="cart_list">
                            @foreach($cart->getItems() as $item)
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img src="{{ $item->getImage() }}" alt="Zdjęcie Produktu"></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Nazwa Produktu</div>
                                            <div class="cart_item_text">{{$item->getName()}}</div>
                                        </div>
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Ilość</div>
                                            <div class="cart_item_text">{{$item->getQuantity()}}</div>
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Cena [PLN]</div>
                                            <div class="cart_item_text">{{$item->getPrice()}}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Suma [PLN]</div>
                                            <div class="cart_item_text">{{$item->getSum()}}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Akcje</div>
                                            <div class="cart_item_text">
                                                <button class="btn btn-danger btn-sm delete" data-id="{{$item->getProductId()}}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                         </ul>
                     </div>
                     <div class="order_total">
                         <div class="order_total_content text-md-end">
                             <div class="order_total_title">Suma:</div>
                             <div class="order_total_amount">PLN {{$cart->getSum()}}</div>
                         </div>
                     </div>
                     <div class="cart_buttons"> <a href="/" type="button" class="button cart_button_clear">Wróć do sklepu</a> <button type="button" class="button cart_button_checkout" disabled>Zapłać</button> </div>
                 </div>
             </div>
         </div>
     </div>
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
url: "{{url('cart')}}/" + $(this).data("id"),
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