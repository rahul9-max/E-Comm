
@extends('master')

@section('content')
<div class="custom-product">
     <div class="col-sm-10">
     <table class="table ">
  <tbody>
    <tr>
      <td>Amount</td>
      <td>${{$total}}</td>
    </tr>
    <tr>
      <td>Tax</td>
      <td>$ 0</td>
    </tr>
    <tr>
      <td>Delivery</td>
      <td>$10</td>
    </tr>
    <tr>
      <td>Total Amount</td>
      <td>${{$total+10}}</td>
    </tr>
  </tbody>
</table>
<form action="/orderplace" method="POST">
  @csrf
  <div class="form-group">
    <label for="address">Address:</label>
    <input type="text" class="form-control" id="address" name="address">
  </div>
  <div class="form-group">
    <label>Payment Option:</label><br>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="delivery" >
      <label class="form-check-label" for="standard">
        Online Payment
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="delivery" >
      <label class="form-check-label" for="express">
        EMI payment
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="delivery">
      <label class="form-check-label" for="pickup">
        Pay on Delivery
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Order Now</button>
</form>
        </div>
    </div>

@endsection
