@extends('master')

@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Results for Products</h4>
            <a class="btn btn-success" href="{{ url('ordernow') }}">Order Now</a>
            <br><br>
            @forelse($products as $item)
            <div class="row searched-item cart-list-divider">
                <div class="col-sm-3">
                    <a href="{{ url('detail', $item->id) }}">
                        <img class="trending-image" src="{{ $item->gallery }}" alt="{{ $item->name }}">
                    </a>
                </div>
                <div class="col-sm-4">
                    <div class="">
                        <h2>{{ $item->name }}</h2>
                        <h5>{{ $item->description }}</h5>
                    </div>
                </div>
                <div class="col-sm-3">
                    <form action="{{ url('remove', $item->cart_id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">Remove from Cart</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="alert alert-warning" role="alert">
                Your cart is empty!
            </div>
            @endforelse
            <a class="btn btn-success" href="{{ url('ordernow') }}">Order Now</a>
            <br><br>
        </div>
    </div>
</div>
@endsection