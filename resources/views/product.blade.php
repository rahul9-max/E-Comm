@extends('master')

@section('content')
@if(session()->has('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<main>
  <!-- <div class="container-fluid"> -->
  <div class="custom-product">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
          @foreach($products as $key => $p)
          <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="{{$p->id==1?'active':''}}"></li>
          @endforeach
      </ol>
      <div class="carousel-inner">
          @foreach($products as $p)
          <div class="carousel-item {{$p->id==1?'active':''}}">
              <a href="detail/{{$p->id}}">
                  <img class="d-block w-100 slider-img" src="{{$p->gallery}}" alt="{{$p->name}}" width="800" height="400" style="object-fit: cover;">
                  <div class="carousel-caption slider-text">
                      <h5 class="text-white">{{$p->name}}</h5>
                      <p class="text-white">{{$p->description}}</p>
                  </div>
                </a>
          </div>

          @endforeach
      </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
</div>
      <div class="trending-wrapper mt-4">
          <h3 class="mb-4">Trending Products</h3>
          <div class="row">
              @foreach($products as $p)
              <div class="col-md-3 col-sm-6 mb-3">
                  <div class="card shadow-sm">
                      <a href="detail/{{$p->id}}">
                          <img class="card-img-top trending-image" src="{{$p->gallery}}" alt="{{$p->name}}">
                      </a>
                      <div class="card-body">
                          <h5 class="card-title">{{$p->name}}</h5>
                          <p class="card-text">{{$p->description}}</p>
                          <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                  <a href="detail/{{$p->id}}" class="btn btn-sm btn-outline-secondary">View</a>
                                  <form action="{{ url('add-to-cart') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="product_id" value="{{$p->id}}">
                                      <button type="submit" class="btn btn-sm btn-outline-primary">Add to Cart</button>
                                  </form>
                              </div>
                              <span class="text-muted">{{$p->price}}</span>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
    </div>
  
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="/css/my-custom-styles.css">
<style>
.custom-product {
    height: 600px;
    padding-top: 50px;
    padding-bottom: 50px;
}

.carousel-caption {
    bottom: 3rem;
}

.slider-text {
    background-color: rgba(0,0,0,0.7);
    padding: 1rem;
    border-radius: 1rem;
}

.trending-wrapper {
    padding: 2rem 0;
    margin-bottom: 5rem; /* add some bottom margin to create space between the trending products section and the footer */
}

.trending-image {
    height: 15rem;
    object-fit: cover;
}

.card {
    border: none;
}

.card-title {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
    color: #333;
}
.card-text {
    font-size: 0.9rem;
    color: #777;
}

main {
    padding: 2rem 0;
}
</style>
@endpush