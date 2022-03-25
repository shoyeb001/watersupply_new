 <!-- navigation bar -->
    <nav class="display-inline space-between">
        <div class="nav-logo display-inline">
            <img src="{{asset("frontend//assets/logo.png")}}" alt="logo">
            <h2>Water Supply</h2>
        </div>
        <ul class="display-inline">
            <li><a class="active" href="{{route("home")}}">Home</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="{{route("view.order")}}">Services</a></li>
            <li><a href="#">Contact us</a></li>
            @if((session("USER_ID"))==NULL)
            <li><a href="{{route("user.login.view")}}">Login</a></li>
            @else 
            <li><a href="{{route("my.account")}}">My Account</a></li>
            @endif
          {{--  <li>
                <a href="./cart.html" class="my-cart display-inline">
                    <div class="cart-img">
                        <img src="{{asset("frontend/assets/icons/cart-outline.svg")}}">
                        <div class="badge display-inline justify-center">4</div>
                    </div>
                    <div>Cart</div>
                </a>
            </li>--}}
        </ul>
    </nav>
    <div class="bottom-nav">
        <div class="nav-container">
            <ul class="display-inline space-between">
                <li>
                    <a class="hamburger-btn" href="#">
                        <ion-icon class="icon-nav" name="grid-outline"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="{{route("home")}}">
                        <ion-icon class="icon-nav active-nav" name="home-outline"></ion-icon>
                    </a>
                </li>
                <li>
                    <a href="{{route("my.account")}}">
                        <ion-icon class="icon-nav" name="settings-outline"></ion-icon>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg-shadow remove-shadow"></div>
    <div class="drawer">
        <div class="nav-logo display-inline">
            <img src="{{asset("frontend/assets/logo.png")}}" alt="logo">
            <h2>Water Supply</h2>
        </div>
        <ul class="display-inline">
            <li><a class="active" href="{{route("home")}}">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact us 2</a></li>
            @if((session("USER_ID"))==NULL)
            <li><a href="{{route("user.login.view")}}">Login</a></li>
            @else 
            <li><a href="{{route("my.account")}}">My Account</a></li>
            @endif
        </ul>
    </div>

