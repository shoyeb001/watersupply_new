@extends("frontend.master")
@section("frontend");
        <!-- bread crumb section -->
        <section class="breadcrumb">
            <div class="wrapper display-inline">
                <a href="/home.html">Home</a>
                <ion-icon name="chevron-forward-outline"></ion-icon>
                <a href="/services.html">Services</a>
            </div>
        </section>
        @if(session("msg"))
        <section class="breadcrumb">
            <div class="wrapper display-inline">
                <p>{{session("msg")}}</p>
            </div>
        </section>
        @endif
        <!-- heading section  -->
        <section class="heading">
            <div class="wrapper display-inline justify-center">
                <h1>Order Now</h1>
                <p>Ready To Get Our Premium Water Delivery Service.</p>
            </div>
        </section>
        <!-- order services -->
        <section class="order-services">
            <h1>Our Services</h1>
            <div class="container display-inline justify-center">
                <p>Home delivery</p>
                <p>Marriage Party</p>
                <p>Wedding Party</p>
                <p>Annual Function</p>
                <p>Birthday Party</p>
                <p>School Function</p>
                <p>Events</p>
                <p>Wholesale & Retail</p>
            </div>
        </section>
        <!-- form section -->
        <section class="sign order-form">
                <div class="wrapper">
                    <div class="title">
                        <div class="display-inline justify-center">
                            <img src="{{asset("frontend/assets/logo.png")}}" alt="logo">
                            <h2>Water Supply</h2>
                        </div>
                        <h1>Pay Online</h1>
                    </div>
                    <form action="{{ route('razorpay.payment.store') }}" method="POST" >
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="{{ env('RAZORPAY_KEY') }}"
                        data-amount="{{$data["price"] * 100}}"
                        data-currency="INR"
                        data-buttontext="Pay {{$data["price"]}} INR"
                        data-name="Water Supply"
                        data-description="Rozerpay"
                        data-image="{{asset("frontend/assets/logo.png")}}"
                        data-prefill.name="{{$data["customer_name"]}}"
                        data-prefill.email="{{$data["email"]}}"
                        data-theme.color="#F37254"></script>
                        <input type="hidden" name="customer_name" value="{{$data["customer_name"]}}">
                        <input type="hidden" name="email" value="{{$data["email"]}}">
                        <input type="hidden" name="phone_no" value="{{$data["phone_no"]}}">
                        <input type="hidden" name="pin_no" value="{{$data["pin_no"]}}">
                        <input type="hidden" name="city" value="{{$data["city"]}}">
                        <input type="hidden" name="state" value="{{$data["state"]}}">
                        <input type="hidden" name="country" value="{{$data["country"]}}">
                        <input type="hidden" name="product_id" value="{{$data["product_id"]}}">
                        <input type="hidden" name="price" value="{{$data["price"]}}">
                        <input type="hidden" name="quantity" value="{{$data["quantity"]}}">
                        <input type="hidden" name="full_address" value="{{$data["full_address"]}}">
                        <input type="hidden" name="message" value="{{$data["message"]}}">

                        </form>
                </div>
        </section>
    </div>

    <!-- font-icons -->

    @endsection
   