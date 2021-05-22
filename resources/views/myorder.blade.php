@extends('master')
@section("content")
<div class="custom-product">
	<div class="col-sm-10">
		<div class="trending-wrapper">
			<h4>Orderku</h4>
			<br><br>
			@foreach($order as $item)
			<div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-image" src="{{$item->gallery}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>Nama : {{$item->name}}</h2>
                      <h5>Status : {{$item->status}}</h5>
                      <h5>Alamat : {{$item->alamat}}</h5>
                      <h5>Status Pembayaran : {{$item->pay_status}}</h5>
                      <h5>Metode Pembayaran : {{$item->pay_method}}</h5>
                    </div>
              </div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection



