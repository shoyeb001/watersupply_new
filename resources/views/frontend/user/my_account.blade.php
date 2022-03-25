@extends("frontend.master")
@section("frontend");
 
 <!-- bread crumb section -->
 <section class="breadcrumb">
    <div class="wrapper display-inline">
        <a href="/home.html">Home</a>
        <ion-icon name="chevron-forward-outline"></ion-icon>
        <a href="/my_account.html">My Account</a>
    </div>
</section>
<!-- account settings -->
<section class="settings">
    <div class="mob-click-event display-inline show-mob-bar">
        <div class="display-inline">
            <ion-icon class="icon-icon" name="grid-outline"></ion-icon>
            <p>Options</p>
        </div>
    </div>
</section>
<section class="account-setting">
    <div class="options account-nav-bar">
        <div data-tab-target="#account-setting" class="account-tab-hide">
            <span>Account Settings</span>
        </div>
        <div data-tab-target="#account-orders" class="account-tab-hide">
            <span>My Orders</span>
        </div>
        <div data-tab-target="#credits" class="account-tab-hide">
            <span>Credits</span>
        </div>
        <div data-tab-target="#account-track" class="account-tab-hide">
            <span>Track Order</span>
        </div>
        <div data-tab-target="#account-address" class="account-tab-hide">
            <span>Address</span>
        </div>
        <div data-tab-target="#account-password" class="account-tab-hide">
            <span>Chenge Password</span>
        </div>
        <div>
            <a href="{{route("user.logout")}}"><span>Logout</span></a>
        </div>
    </div>
    <div class="setting-container actives" id="account-setting" data-tab-scontent>
        <div class="personal">
            <h2 class="title">Personal Information</h2>
            <p>{{session("msg")}}</p>
            <form class="form-group" action="{{route("myaccount.personal.update")}}" method="POST">
            @csrf
                <div class="input-group">
                    <div class="input-field">
                        <div>
                            <label for="sub">Username *</label>
                        </div>
                        <div>
                            <input type="text" id="sub" name="username" value="{{$user[0]->name}}" />
                        </div>
                    </div>
                    <div class="input-field">
                        <div>
                            <label for="fname">Phone/Mobile *</label>
                        </div>
                        <div>
                            <input type="number" id="fname" name="phone_no" value="{{$user[0]->phone_no}}" />
                        </div>
                    </div>
                </div>
            </div>
        <div class="account">
            <h2 class="title">Account Information</h2>
            <form class="form-group">
                <div class="input-field">
                    <div>
                        <label for="fname">Email *</label>
                    </div>
                    <div>
                        <input type="text" id="fname" name="email" value="{{$user[0]->email}}" />
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-field">
                        <div>
                            <label for="sub">Password *</label>
                        </div>
                        <div>
                            <input type="password" id="sub" name="password"/>
                        </div>
                    </div>
                </div>
            <button class="button-primary" type="submit">Save Changes</button>
            </form>
        </div>
    </div>
    <div class="order-container" id="account-orders" data-tab-scontent>
        <div class="nutration-details">
            <h2 class="title">My Order Details</h2>
            <div class="title-type">
                <p class="title">Service Type</p>
                <p class="type">Weekly/Monthly</p>
            </div>
            <table id="customers">
                <tr>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Container</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->order_id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->order_status}}</td>
                    <td>{{$order->product->product_title}}</td>
                    <td>{{$order->product->product_price}}₹/L</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}₹</td>
                </tr>
                @endforeach
  
            </table>
            <table id="order-table">
                <tr>
                    <th>Order Date</th>
                    <th>Order Name</th>
                    <th>Cancel Order</th>
                </tr>
                @foreach ($orders as $order)
                    
                <tr>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->product->product_title}}</td>
                    @if ($order->order_status != "delivered")
                    <td><a href="{{route("order.cancel",$order->id)}}"><button class="button-primary">Cancel</button></a></td>
                    @endif
                </tr>
                @endforeach
               
            </table>
           {{-- <button class="button-primary mainbtn">Save Chenges</button> --}}
        </div>
    </div>
    {{--- credits section---}}

    <div class="order-container" id="credits" data-tab-scontent>
        <div class="nutration-details">
            <h2 class="title">Total Credits To Pay</h2>
            <div class="title-type">
                <p class="title">Service Type</p>
                <p class="type">Weekly/Monthly</p>
            </div>
            <table id="customers">
                <tr>
                    <th>Date</th>
                    <th>Total</th>
                </tr>
                @php
                    $i = 0;
                @endphp
                @foreach ($credits as $credit)
                @php
                    $i = $i + $credit->price;
                @endphp
                <tr>
                    <td>{{$credit->created_at}}</td>
                    <td>₹ {{$credit->price}}</td>
                </tr>
                @endforeach
                <tr>
                    <td>Total Credit</td>
                    <td>₹ {{$i}}</td>
                </tr>
  
            </table>
           
           {{-- <button class="button-primary mainbtn">Save Chenges</button> --}}
        </div>
    </div>

    {{---credits section ends ---}}


    <div class="setting-container" id="account-track" data-tab-scontent>
        <div class="account">
            <h2 class="title">Orders tracking</h2>
            <p>
                To track your order please enter your OrderID in the box below and
                press "Track" button. This was given to you on your receipt and in
                the confirmation email you should have received.
            </p>
            <form class="form-group" style="margin-top: 1rem">
                <div class="input-group">
                    <div class="input-field">
                        <div>
                            <label for="sub">Order ID *</label>
                        </div>
                        <div>
                            <input type="text" id="sub" name="firstname" />
                        </div>
                    </div>
                    <div class="input-field">
                        <div>
                            <label for="sub">Billing Email *</label>
                        </div>
                        <div>
                            <input type="text" id="sub" name="firstname" />
                        </div>
                    </div>
                </div>
            </form>
            <button class="button-primary">Track</button>
        </div>
    </div>
    <div class="address-container" id="account-address" data-tab-scontent>
        <h2 class="title">Address</h2>
        <div class="wrapper">
            <address class="billing">
                {{$user[0]->full_address_1}}
                <br />
                State: {{$user[0]->state}}
                <br />
                City: {{$user[0]->city}}
                <br />
                Phone: {{$user[0]->phone_no}}
            </address>
            <a class="button-primary" href="#">Edit</a>
        </div>
        <div class="wrapper">
            <address class="billing">
                {{$user[0]->full_address_2}}
                <br />
                State: {{$user[0]->state}}
                <br />
                City: {{$user[0]->city}}
                <br />
                Phone: {{$user[0]->phone_no}}
            </address>
            <a class="button-primary" href="#">Edit</a>
        </div>
    </div>
    <div class="setting-container" id="account-password" data-tab-scontent>
        <div class="account">
            <h2 class="title">Chenge Password</h2>
            <form class="form-group" action="{{route("password.update")}}" method="POST">
                <div class="input-group">
                    <div class="input-field">
                        @csrf
                        <div>
                            <label for="sub">Old Passwrd *</label>
                        </div>
                        <div>
                            <input type="text" id="sub" name="old_password" />
                        </div>
                    </div>
                    <div class="input-field">
                        <div>
                            <label for="sub">New Password *</label>
                        </div>
                        <div>
                            <input type="text" id="sub" name="new_password" />
                        </div>
                    </div>
                </div>
            <button class="button-primary" type="submit">Save Changes</button>
        </form>

        </div>
    </div>
</section>
</div>

@endsection
