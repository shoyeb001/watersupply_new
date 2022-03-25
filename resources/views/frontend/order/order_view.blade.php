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
            <form action="{{route("order.checkout")}}" method="POST">
                @csrf
                <div class="wrapper">
                    <div class="title">
                        <div class="display-inline justify-center">
                            <img src="{{asset("frontend/assets/logo.png")}}" alt="logo">
                            <h2>Water Supply</h2>
                        </div>
                        <h1>Your Order</h1>
                    </div>
                    <div class="form">
                        <input type="hidden" name="user_id" value="{{$user[0]->id}}">
                        <div class="inputfield">
                            <label>Your Name: <span>*</span></label>
                            <input type="text" class="input" name="customer_name" value="{{$user[0]->name}}" required>
                        </div>
                        <div class="inputfield">
                            <label>Email Id: <span>*</span></label>
                            <input type="email" class="input" name="email" value="{{$user[0]->email}}" required>
                        </div>
                        <div class="inputfield">
                            <label>Phone No: <span>*</span></label>
                            <input type="number" class="input" name="phone_no" value="{{$user[0]->phone_no}}" required>
                        </div>
                        <div class="inputfield">
                            <label>Pin No: <span>*</span></label>
                            <input type="number" class="input" name="pin_no" value="{{$user[0]->pin_no}}" required>
                        </div>
                        <div class="inputfield">
                            <label>City <span>*</span></label>
                            <div class="custom_select">
                                <select name="city" required>
                                    <option value="">Select</option>
                                    @foreach ($city as $item)
                                    <option value="{{$item->city_name}}" {{ $user[0]->city == $item->city_name ? 'selected': '' }} >{{$item->city_name}}</option>

                                    @endforeach
        
                                </select>
                            </div>
                        </div>
                        <div class="inputfield">
                            <label>Country <span>*</span></label>
                            <div class="custom_select">
                                <select name="country" required>
                                    <option value="">Select</option>
                                    <option value="India" {{ $user[0]->country == "India" ? 'selected': '' }} >India</option>
                                    <option value="USA" {{ $user[0]->country == "USA" ? 'selected': '' }} >USA</option>
                                </select>
                            </div>
                        </div>
                        <div class="inputfield">
                            <label>State <span>*</span></label>
                            <div class="custom_select">
                                <select name="state" required>
                                    <option value="">Select</option>
                                    <option value="Bihar" {{ $user[0]->state == "Bihar" ? 'selected': '' }} >Behir</option>
                                    <option value="West Bengal" {{ $user[0]->state == "West Bengal" ? 'selected': '' }} >West Bengal</option>
                                </select>
                            </div>
                        </div>
                        <div class="inputfield">
                            <label>Payment Method <span>*</span></label>
                            <div class="custom_select">
                                <select name="payment_type" required>
                                    <option value="">Select</option>
                                    <option value="credit">Credit</option>
                                    <option value="cash">Cash on Delivery</option>
                                    <option value="online">Online</option>
                                </select>
                            </div>
                        </div>
                        <div class="inputfield">
                            <label>Full Address: <span>*</span></label>
                            <textarea class="textarea" name="full_address" required>{{$user[0]->full_address_1}}</textarea>
                        </div>
                        <div class="inputfield">
                            <label>Bottle / Container : <span>*</span></label>
                            <div class="custom_select">
                                <select name="product_id" required>
                                    <option value="">Select</option>
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->product_title}} {{$product->category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="inputfield">
                            <label>Number of Bottle / Container: <span>*</span></label>
                            <input type="text" class="input" name="qty" required>
                        </div>
                        {{--<div class="inputfield">
                            <label>Service Type: <span>*</span></label>
                            <div class="custom_select">
                                <select onchange="showDiv(value)">
                                    <option value="">Select</option>
                                    <option class="daily-click" value="daily">Daily Basis</option>
                                    <option class="frequently-click" value="frequently">Frequently</option>
                                </select>
                            </div>
                        </div>
                        <!-- Daily Basis -->
                        <div class="basis show-daily">
                            <h3>Daily Basis</h3>
                            <div class="basis-wrapper">
                                <div class="inputfield">
                                    <label>Estimate Time: <span>*</span></label>
                                    <input type="time" class="input">
                                </div>
                                <div class="inputfield">
                                    <label>Select Day: <span>*</span></label>
                                    <div class="display-inline">
                                        <p>Sunday</p>
                                        <p>Monday</p>
                                        <p>Tuesday</p>
                                        <p>Wednesday</p>
                                        <p>Thursday</p>
                                        <p>Friday</p>
                                        <p>Saturday</p>
                                    </div>
                                </div>
                                <h4 class="display-inline justify-center">Or</h4>
                                <div class="inputfield terms">
                                    <label class="check">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Check for seven days in a week</p>
                                </div>
                            </div>
                        </div>
                        <!-- Weekly Monthly Wholesale -->
                        <div class="basis show-frequently">
                            <h3>Frequently</h3>
                            <div class="basis-wrapper">
                                <div class="inputfield">
                                    <label>Estimate Time: <span>*</span></label>
                                    <input type="time" class="input">
                                </div>
                                <div class="inputfield">
                                    <label>Estimate Time: <span>*</span></label>
                                    <input type="date" class="input">
                                </div>
                            </div>
                        </div>--}}
                        <div class="inputfield">
                            <label>Your Message: </label>
                            <textarea class="textarea" name="msg"></textarea>
                        </div>
                        <div class="inputfield">
                            <input type="submit" value="Order Now" class="btn">
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <!-- font-icons -->

    @endsection
   