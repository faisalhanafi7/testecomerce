@extends('master')
@section("content")
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <img class="detail-img" src="{{$product['gallery']}}">
    </div>
    <div class="col-sm-6">
       <a href="/">Kembali</a>
       <h2>{{$product['name']}}</h2>
       <h3>Harga : {{$product['price']}}</h3>
       <h4>Detail : {{$product['description']}}</h4>
       <h4>Category : {{$product['category']}}</h4>
       <br><br>
       <form action="/keranjang" method="POST">
        @csrf
         <input type="hidden" name="product_id" value="{{$product['id']}}">
       <button class="btn btn-primary"><i class="fa fa-shopping-cart">  Tambah ke Keranjang</i></button>
       </form>
       <br><br>
       <a href="/order" class="btn btn-success"><i class="fa fa-money" aria-hidden="true"> Beli Sekarang</i></a>
       <br><br>
    </div> 
  </div>
</div>
@endsection



<!--  -->