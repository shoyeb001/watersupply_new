@extends("frontend.master")
@section("slider");

<div class="header-container">
    <div class="wrapper display-inline justify-center">
        <h1 data-aos="fade-down">Professionally treated water <br> all over the house</h1>
        <p data-aos="fade-right">Contact your local water supplier. Always want safe and good water for
            healthy life.</p>
        <button data-aos="fade-left" class="button-primary">Explore More</button>
    </div>
</div>
@endsection
@section("frontend");


<!-- products-section -->
<section class="product">
<div class="main-title display-inline space-between">
    <h2 data-aos="fade-down">New Products</h2>
    <a class="button-primary" data-aos="fade-down" href="{{route("view.order")}}">Book Now</a>
</div>
<div class="product-container">
<?php
$products = App\Models\Product::latest()->take(8)->get();
    
?>
@foreach ($products as $item)
<div class="product">
    <a href="#">
        <img src="{{asset("$item->product_image")}}" alt="products">
    </a>
    <div>
        <a href="{{route("product.details",$item->product_slug)}}">
            <p class="title">{{$item->product_title}}</p>
        </a>
        <div class="display-inline space-between">
            <p class="price">₹{{$item->product_price}}</p>
            <p class="qty">{{$item->category->category_name}}</p>
        </div>
    </div>
    <div class="cart display-inline">
        <ion-icon class="cart-img" name="cart-outline"></ion-icon>
    </div>
</div>
@endforeach
</div>
</section>
<!-- features-section -->
<section class="features">
<div class="heading">
    <h1>Why choose us ?</h1>
</div>
<div class="container display-inline space-between">
    <div class="content">
        <img src="{{asset("frontend/assets/features/img-1.png")}}" alt="futures">
        <div>
            <h2 class="title">Maxium Purity</h2>
            <p>Lorem ipsum dolor sit amet adipelit sed eiusmte.</p>
        </div>
    </div>
    <div class="content">
        <img src="{{asset("frontend/assets/features/img-2.png")}}" alt="futures">
        <div>
            <h2 class="title">Cholorine Free</h2>
            <p>Lorem ipsum dolor sit amet adipelit sed eiusmte.</p>
        </div>
    </div>
    <div class="content">
        <img src="{{asset("frontend/assets/features/img-3.png")}}" alt="futures">
        <div>
            <h2 class="title">5 Steps Filtration</h2>
            <p>Lorem ipsum dolor sit amet adipelit sed eiusmte.</p>
        </div>
    </div>
    <div class="content">
        <img src="{{asset("frontend/assets/features/img-4.png")}}" alt="futures">
        <div>
            <h2 class="title">Healthy Water</h2>
            <p>Lorem ipsum dolor sit amet adipelit sed eiusmte.</p>
        </div>
    </div>
</div>
</section>
<!-- our services -->
<section class="service">
<div class="wrapper">
    <h2>Our services</h2>
    <div class="container">
        <p>Home delivery</p>
        <p>Marriage Party</p>
        <p>Wedding Party</p>
        <p>Annual Function</p>
        <p>Birthday Party</p>
        <p>School Function</p>
        <p>Events</p>
        <p>Wholesale & Retail</p>
    </div>
</div>
</section>
</div>

@endsection
