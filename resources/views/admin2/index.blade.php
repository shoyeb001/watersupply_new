@extends("admin2.master")
@section("admin")
<div id="page-content-wrapper">
    <div class="container-fluid sidebar-bg">

        <div class="row p-4">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col p-3 m-2 card-small card-success">
                      @php
                       $credits =  App\Models\Order::where("payment_type","credit")->where("payment_status","unpaid")->get();
                       $val = 0;
                       foreach ($credits as $credit) {
                          $val = $val + $credit->price;
                        }
                      @endphp
                     <h4>&#8377 {{$val}}</h4>
                     <h5 class="text-success">TO collect <i class="fa fa-solid fa-arrow-up"></i></h5>
                    </div>
                    <div class="col p-3 m-2 card-small card-danger">
                     <h4>&#8377 42,227</h4>
                     <h5 class="text-danger">TO Pay <i class="fa fa-solid fa-arrow-down"></i></h5>
                    </div>
                    <div class="col p-3 m-2 card-small card-success">
                     <h4>&#8377 42,227</h4>
                     <h5 class="text-success">This week sale</h5>
                    </div>
                </div>
                <div class="row">
                 <div class="col p-3 m-2 card-small card-success">
                  <h4>&#8377 42,227</h4>
                  <h5 class="text-success">Stock value <i class="fa fa-solid fa-arrow-up"></i></h5>
                 </div>
                 <div class="col p-3 m-2 card-small card-success">
                  <h4>&#8377 42,227</h4>
                  <h5 class="text-success">Total Balance <i class="fa fa-solid fa-arrow-up"></i></h5>
                 </div>
                 <div class="col p-3 m-2 card-small card-success">
                  <h4>Report</h4>
                  <h5 class="text-success">Salary, Party etc..</h5>
                 </div>
             </div>
             <hr>


             <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Paid</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Unpaid</button>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
               @foreach($paidorders as $paidorder)
               <a href="{{route("online.invoice", $paidorder->id)}}" style="text-decoration:none; color: #000;"> <div class="card mb-2 mt-2 shadow">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-sm-12 col-md-10 col-lg-10">
                              <h6>{{$paidorder->full_address}}, {{$paidorder->state}}, pin: {{$paidorder->pin_no}}, <br> Phone : {{$paidorder->phone_no}}</h6>
                              <p class="card-text">Order Id #{{$paidorder->order_id}}</p>
                              <p>Order Date: {{$paidorder->created_at}}</p>
                          </div>
                          <div class="col-sm-12 col-lg-2 col-md-2">
                              <p class="card-text">&#8377 {{$paidorder->price}}</p>
                              <span class="badge bg-success">{{$paidorder->payment_status}}</span>
                          </div>
                      </div>
                  
                   
                  </div>
                </div></a>
              @endforeach
          
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @foreach($unpaidorders as $unpaidorder)
                <a href="{{route("online.invoice", $paidorder->id)}}" style="text-decoration:none; color:#000;"><div class="card mb-2 mt-2 shadow ">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-sm-12 col-md-10 col-lg-10">
                              <h6>{{$unpaidorder->full_address}}, {{$unpaidorder->state}}, pin: {{$unpaidorder->pin_no}}, <br> Phone : {{$unpaidorder->phone_no}}</h6>
                              <p class="card-text">Order Id #{{$unpaidorder->order_id}}</p>
                              <p>Order Date: {{$unpaidorder->created_at}}</p>
                          </div>
                          <div class="col-sm-12 col-lg-2 col-md-2">
                              <p class="card-text">&#8377 {{$unpaidorder->price}}</p>
                              <span class="badge bg-success">{{$unpaidorder->payment_status}}</span>
                          </div>
                      </div>
                  </div>
                </div></a>
              @endforeach
              </div>
            </div>

         
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
@endsection
