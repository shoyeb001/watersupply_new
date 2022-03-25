@extends("admin2.master")
@section("admin")
<div id="page-content-wrapper">
    <div class="container-fluid">
        @foreach ($users as $user)
        <div class="card card-boy shadow m-2">
            <div class="card-body">
                <h4 class="fw-bold">Name : {{$user->user->name}}</h4>
                <p>Phone No : +91 {{$user->user->phone_no}}</p>
                <p>Address : {{$user->user->full_address}}, {{$user->user->state}} - {{$user->user->pin_no}}</p>
                <div class="row">
                    <div class="col-lg-8 col-sm-12 col-md-8">
                        <h5 class="fw-bold">Service type : Daily</h5>
                        {{--<span class="badge bg-success">S</span>
                        <span class="badge bg-success">M</span>
                        <span class="badge bg-success">T</span>
                        <span class="badge bg-success">W</span>
                        <span class="badge bg-success">T</span>
                        <span class="badge bg-secondary">F</span>
                        <span class="badge bg-success">S</span> <br />--}}
                        <h6 class="p-2">
                            Credits : 
                            @php
                               
                               $credits = App\Models\Order::where("payment_type","credit")->where("payment_status","unpaid")->get();
                                $val = 0;
                               foreach ($credits as $credit) {
                                    $val = $val + $credit->price;
                                }
                            @endphp
                            <span class="badge bg-info">₹ {{$val}}</span>
                        </h6>
                        <a class="btn btn-success" href="{{route("pay.credit", $user->user->id)}}">
                            Pay Credits
                        </a>
                    </div>
                   {{--- <div class="col-lg-4 col-md-4 col-sm-12">
                        <table class="table table-borderless">
                            <tr>
                                <th>Ordered Method :</th>
                                <th>{{$item->payment_method}}</th>
                            </tr>
                            <tr>
                                <td>Price :</td>
                                <td>{{$item->price}}</td>
                            </tr>
                            <tr>
                                <td>Delievery Charge :</td>
                                <td>40</td>
                            </tr>
                            <tr class="total">
                                <td class="p-2">Total :</td>
                                <td class="p-2">{{$item->price + 40}}</td>
                            </tr>
                        </table>
                        <a
                            class="btn btn-danger m-2"
                            href="{{route("delivery.success",$item->id)}}"
                        >
                            Delievery Sucessfull
                    </a>
                    </div>---}}
                </div>
            </div>
        </div>
        @endforeach
        {{--
        <div class="card card-boy shadow m-2">
            <div class="card-body">
                <p>#23452</p>
                <h4 class="fw-bold">Name : Alka Rani</h4>
                <p>Phone No : +91 9876543210</p>
                <p>Address : Sector ix, Kolkata - 70001, Near college more</p>
                <div class="row">
                    <div class="col-lg-8 col-sm-12 col-md-8">
                        <h5 class="fw-bold">Service type : Daily Basis</h5>

                        <span class="badge bg-success">S</span>
                        <span class="badge bg-success">M</span>
                        <span class="badge bg-success">T</span>
                        <span class="badge bg-success">W</span>
                        <span class="badge bg-success">T</span>
                        <span class="badge bg-secondary">F</span>
                        <span class="badge bg-success">S</span> <br />
                        <h6 class="p-2">
                            Quantity :
                            <span class="badge bg-info">10L x 2</span>
                        </h6>
                        <h6 class="p-1">
                            Product :
                            <span class="badge bg-info">Bisleri Water Can</span>
                        </h6>
                        <button type="button" class="btn btn-success">
                            Call Now
                        </button>
                        <button type="button" class="btn btn-success">
                            Message
                        </button>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <table class="table table-borderless">
                            <tr>
                                <th>Ordered Method :</th>
                                <th>Cash</th>
                            </tr>
                            <tr>
                                <td>Price :</td>
                                <td>190</td>
                            </tr>
                            <tr>
                                <td>Delievery Charge :</td>
                                <td>40</td>
                            </tr>
                            <tr class="total">
                                <td class="p-2">Total :</td>
                                <td class="p-2">230</td>
                            </tr>
                        </table>
                        <button
                            type="button"
                            class="btn btn-danger disabled m-2"
                        >
                            Delievery Sucessfull
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-boy shadow m-2">
            <div class="card-body">
                <p>#23452</p>
                <h4 class="fw-bold">Name : Alka Rani</h4>
                <p>Phone No : +91 9876543210</p>
                <p>Address : Sector ix, Kolkata - 70001, Near college more</p>
                <div class="row">
                    <div class="col-lg-8 col-sm-12 col-md-8">
                        <h5 class="fw-bold">Service type : Daily Basis</h5>

                        <span class="badge bg-success">S</span>
                        <span class="badge bg-success">M</span>
                        <span class="badge bg-success">T</span>
                        <span class="badge bg-success">W</span>
                        <span class="badge bg-success">T</span>
                        <span class="badge bg-secondary">F</span>
                        <span class="badge bg-success">S</span> <br />
                        <h6 class="p-2">
                            Quantity :
                            <span class="badge bg-info">10L x 2</span>
                        </h6>
                        <h6 class="p-1">
                            Product :
                            <span class="badge bg-info">Bisleri Water Can</span>
                        </h6>
                        <button type="button" class="btn btn-success">
                            Call Now
                        </button>
                        <button type="button" class="btn btn-success">
                            Message
                        </button>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <table class="table table-borderless">
                            <tr>
                                <th>Ordered Method :</th>
                                <th>Cash</th>
                            </tr>
                            <tr>
                                <td>Price :</td>
                                <td>190</td>
                            </tr>
                            <tr>
                                <td>Delievery Charge :</td>
                                <td>40</td>
                            </tr>
                            <tr class="total">
                                <td class="p-2">Total :</td>
                                <td class="p-2">230</td>
                            </tr>
                        </table>
                        <button
                            type="button"
                            class="btn btn-danger disabled m-2"
                        >
                            Delievery Sucessfull
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-boy shadow m-2">
            <div class="card-body">
                <p>#23452</p>
                <h4 class="fw-bold">Name : Alka Rani</h4>
                <p>Phone No : +91 9876543210</p>
                <p>Address : Sector ix, Kolkata - 70001, Near college more</p>
                <div class="row">
                    <div class="col-lg-8 col-sm-12 col-md-8">
                        <h5 class="fw-bold">Service type : Daily Basis</h5>

                        <span class="badge bg-success">S</span>
                        <span class="badge bg-success">M</span>
                        <span class="badge bg-success">T</span>
                        <span class="badge bg-success">W</span>
                        <span class="badge bg-success">T</span>
                        <span class="badge bg-secondary">F</span>
                        <span class="badge bg-success">S</span> <br />
                        <h6 class="p-2">
                            Quantity :
                            <span class="badge bg-info">10L x 2</span>
                        </h6>
                        <h6 class="p-1">
                            Product :
                            <span class="badge bg-info">Bisleri Water Can</span>
                        </h6>
                        <button type="button" class="btn btn-success">
                            Call Now
                        </button>
                        <button type="button" class="btn btn-success">
                            Message
                        </button>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <table class="table table-borderless">
                            <tr>
                                <th>Ordered Method :</th>
                                <th>Cash</th>
                            </tr>
                            <tr>
                                <td>Price :</td>
                                <td>190</td>
                            </tr>
                            <tr>
                                <td>Delievery Charge :</td>
                                <td>40</td>
                            </tr>
                            <tr class="total">
                                <td class="p-2">Total :</td>
                                <td class="p-2">230</td>
                            </tr>
                        </table>
                        <button
                            type="button"
                            class="btn btn-danger disabled m-2"
                        >
                            Delievery Sucessfull
                        </button>
                    </div>
                </div>
            </div>
        </div>
        --}}
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection
