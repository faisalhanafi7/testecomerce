@extends('master')
@section("content")
<div class="custom-product">
	<div class="col-sm-10">
		<div class="trending-wrapper">
			<h4>Daftar Barang</h4>

			@foreach($products as $item)
			<div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-image" src="{{$item->gallery}}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>{{$item->name}}</h2>
                      <h5>{{$item->description}}</h5>
                    </div>
             </div>
			  <div class="col-sm-3">
			     <a href="/hapus/{{$item->cart_id}}" class="btn btn-danger">Hapus</a>
			  </div>
			</div>
			@endforeach
		</div>
		<br> <br>
		<a href="/order" class="btn btn-success">Beli Sakarang</a> 
	</div>
</div>
@endsection



