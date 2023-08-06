<?php
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user')){
    $total=ProductController::cartItem();
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">

    <a class="navbar-brand" href="/">E-COMM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('save')}}">Register</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
                <a class="nav-link" href="/cartlist">Cart({{$total}})</a>
            </li>
</ul>
<div class="dropdown">
    @if(Session::has('user'))
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    {{Session::get('user')['name']}}
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="/logout">Logout</a>
  @else
  <a class="nav-link" href="/login">Login</a>
  @endif
  </div>
</div>
    </div>
</nav>