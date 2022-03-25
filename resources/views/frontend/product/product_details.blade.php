@extends("frontend.master")
@section("frontend");

 <!-- bread crumb section -->
 <section class="breadcrumb">
    <div class="wrapper display-inline">
        <a href="/home.html">Home</a>
        <ion-icon name="chevron-forward-outline"></ion-icon>
        <a href="/products.html">My Product</a>
        <ion-icon name="chevron-forward-outline"></ion-icon>
        <a href="/product_details.html">Product Details</a>
    </div>
</section>
<section class="product-details">
    <div class="container display-inline">
        <div class="product-img">
            <img src="{{asset($product[0]->product_image)}}" alt="product">
        </div>
        <div class="product-des">
            <h2 class="title">{{$product[0]->product_title}}</h2>
            <span class="qty">{{$product[0]->category->category_name}}</span>
            <p class="price">₹ {{$product[0]->product_price}}</p>
          {{--  <div class="cart-counter display-inline">
                <div class="cart-btn" onclick="decrementCounter()">
                    <ion-icon name="remove-outline"></ion-icon>
                </div>
                <div class="cart-qty" id="cart-price">1</div>
                <div class="cart-btn" onclick="incrementCounter()">
                    <ion-icon name="add-outline"></ion-icon>
                </div>
            </div>
            <div class="custom_select">
                <select>
                    <option value="">Select</option>
                    <option value="10liter">10 L</option>
                    <option value="20liter">20 L</option>
                    <option value="20liter">30 L</option>
                </select>
            </div>--}}
            <a class="button-primary" href="{{route("view.order")}}">Order Now</a>
        </div>
    </div>
</section>

@endsection
