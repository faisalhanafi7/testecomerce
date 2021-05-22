@extends('master')
@section("content")
<div class="custom-product">
  <div class="col-sm-10">
	 <table class="table">
	    <tbody>
	      <tr>
	        <td>Jumlah</td>
	        <td>Rp.{{$total}}</td>
	      </tr>
	      <tr>
	        <td>Cash On Delivery</td>
	        <td>Rp 10.000</td>
	      </tr>
	      <tr>
	        <td>Total</td>
	        <td>Rp.{{$total+10.000}}</td>
	      </tr>
	    </tbody>
   </table>
   <div> 
   	<form action="/checkout" method="post">
   		@csrf
	  <div class="form-group">
	    <textarea class="form-control"  name="alamat" rows="5" placeholder="Masukan Alamat"></textarea>
	  </div>
	  <div class="form-group">
	    <label for="pwd">Pembayaran  :</label><br> 
	    <input type="radio" name="pay" value="cash" > <span>Trandsfer via BCA</span> <br> <br> 
	    <input type="radio" name="pay" value="cash" > <span>Transfer via BRI</span> <br>  <br> 
	    <input type="radio" name="pay" value="cash" > <span>Cash On Delivery</span><br> <br> 
	  </div>
	  <button type="submit" class="btn btn-danger">Checkout</button>
    </form>
   </div>

  </div>
</div>
@endsection



