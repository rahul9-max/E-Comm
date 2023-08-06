@extends('master')

@section('content')
<div class="container py-4">
  <div class="row">
    <div class="col-md-6">
      <img class="detail-img" src="{{$products['gallery']}}" />
    </div>
    <div class="col-md-6 mt-4">
      <div class="card">
        <div class="card-body">
          <a href="/" class="mt-2 mb-4">Go Back</a>
          <h2>{{$products->name}}</h2>
          <h3>Price : {{$products->price}}</h3>
          <h4>Details: {{$products->description}}</h4>
          <h4>category: {{$products->category}}</h4>
          <br><br>
          <form action="/add_to_cart" method="POST">
            @csrf
            <input type="hidden" name="productId" value="{{$products['id']}}" />
            <button class="btn btn-primary" formaction="/cartlist">Add to Cart</button>
          </form>
          <br><br>
          <button class="btn btn-success">Buy Now</button>
          <br><br>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection