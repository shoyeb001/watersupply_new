<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="{{asset("backend2/styles/main.style.css")}}" />
    <link rel="stylesheet" href="{{asset("backend2/styles/bill.css")}}" />
    <title>Invoice</title>
  </head>
  <body>
    <nav
      class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow-lg bg-body rounded m-0 p-0"
    >
      <div class="container">
        <a href="#menu-toggle" class="toogle-icon" id="menu-toggle"
          ><i class="fa fa-solid fa-bars"></i
        ></a>
        <a class="navbar-brand" href="#">
          <img src="{{asset("backend2/Image/water-logo.png")}}" alt="" width="40" height="60" />
          Water supply</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <i class="fa fa-user"></i> Logout</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"
                ><i class="fa fa-gear"></i> settings</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <li></li>
          <li>
            <a href="../index.html" class="p-2"
              ><i class="fa fa-chart-line"></i> Dashboard</a
            >
          </li>
          <li>
            <a href="bill.html" class="p-2"
              ><i class="fa fa-file-invoice"></i> Create Bill</a
            >
          </li>
        </ul>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <div class="container-fluid">
          <div class="row background card-back">
            <div class="col-1 p-2 mt-3">
              <h4>
                <i class="fa fa-solid fa-chevron-left icon-back"></i>
              </h4>
              
            </div>
            <div class="col-11 p-2 m-0">
              <!-- <center> Add new Item <br> <span class="fs-6 number">create new bill</span></center> -->
             <center><h3 class="fw-bold">Bill / Invoice</h3>
            <h6 class="number">#{{$order[0]->order_id}}</h6>
            </center> 
             
            </div>
          </div>

          <div class="mt-5 mb-3">
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <div class="card">
                    <center> <span class="font-weight-bold fs-3 text-decoration-underline">Water Supply</span></center>
                 
                  <div class="table-responsive p-2">
                    <table class="table table-borderless">
                      <tbody>
                        <tr class="content-bill">
                          <td class="font-weight-bold">
                              [Company Name] <br> [street address] <br> [City, ZIP] <br>  Phone no - 9876543210
                          </td>
                          <td class="font-weight-bold">
                           Date : {{$order[0]->created_at}}  <br> Invoice : #{{$order[0]->order_id}} <br> 
                        </td>
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                  <div class="table-responsive p-2">
                    <table class="table table-borderless">
                      <tbody>
                        <tr class="add-table">
                          <td>Customer</td>
                          <td>Ship To</td>
                       {{--   <td>Shipping Details</td> --}}
                        </tr>
                        <tr class="content-bill">
                            <td class="font-weight-bold">
                              [Name] <br> [Company Name] <br> [street address] <br> [City, ZIP] <br>  Phone no - 9876543210
                            </td>
                            <td class="font-weight-bold">
                                {{$order[0]->customer_name}} <br> {{$order[0]->address}} <br>  Phone no - {{$order[0]->phone_no}}
                              </td>
                             {{-- <td class="font-weight-bold">
                                  Frieght Type : [Air, Ocean] <br>
                                  Est. Ship Date : 05/05/2021 <br>
                                  Est. Gross Weight : [weight] [unit] <br>
                                  Est. Dubic Weight : [weight] [unit] <br>
                                  Total Packages : [Quantity]
                              </td> --}}
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <hr />
                  <div class="products p-2">
                    <div class="table-responsive p-2">
                    <table class="table table-bordered">
                      <tbody>
                        <tr class="add-table">
                          <td>Part No</td>
                          <td>Unit of measure</td>
                          <td>Description</td>
                          <td class="text-center">Quantity</td>
                          <td class="text-center">Unit Price</td>
                          {{--<td class="text-center">Tax</td>--}}
                          <td class="text-center">Total amount</td>
                        </tr>
                       <tr>
                           <td> {{$order[0]->order_id}}</td>
                           <td>L</td>
                           <td> {{$order[0]->product->product_title}}
                           </td>
                           <td>{{$order[0]->quantity}}</td>
                           <td> {{ number_format((float) $order[0]->price, 2)}}</td>
                         {{--  <td>2%</td>--}}
                           <td>&#8377 {{number_format((float)  $order[0]->price * $order[0]->quantity, 2)}}</td>
                       </tr>
                      </tbody>
                    </table>
                    </div>
                  </div>
                  <hr />
                  <div class="products p-2">
                    <table class="table table-borderless">
                      <tbody>
                        <tr class="add-table">
                          <td></td>
                          <td>Subtotal</td>
                          <td>Discount( {{$order[0]->discount}} %)</td>
                          <td class="text-center">Total</td>
                        </tr>
                        <tr class="content-bill">
                          <td></td>
                          <td>{{number_format((float)  $order[0]->price * $order[0]->quantity, 2)}}</td>
                          @php
                            $total =  $order[0]->price * $order[0]->quantity;
                            $discount = ($total * $order[0]->discount)/100;
                          @endphp
                          <td>{{number_format((float) $discount)}}</td>
                          <td class="text-center">{{number_format((float) $total-$discount,2)}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <hr />
                  <div class="address p-2">
                    <table class="table table-borderless">
                      <tbody>
                        <tr class="add-table">
                          <td>Terms of Sale and other components</td>
                        </tr>
                        <tr class="content-bill">
                          <td>
                            Lorem ipsum dolor sit amet consectetur 
                          </td>
                        </tr>
                        <tr class="content-bill">
                            <td>
                              Lorem ipsum dolor sit amet consectetur 
                            </td>
                          </tr>
                          <tr class="content-bill">
                            <td>
                              -
                            </td>
                          </tr>
                      </tbody>
                    </table>
                  </div>


                  <div class="address p-2">
                    <table class="table table-borderless">
                      <tbody>
                        <tr class="content-bill">
                          <td>
                              <br>
                              <br>
                            Signature
                          </td>
                          <td>
                              <br>
                              <br>
                              Date
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col p-2 card-back">
                <center>
                <a href="{{route("offline.invoice.view", $order[0]->id)}}"> <i class="fa fa-solid fa-print icon-bottom"></i> </a>
                <a href="{{route("offline.invoice.view", $order[0]->id)}}"> <i class="fa fa-solid fa-download icon-bottom"></i></a>
               <a href= "https://wa.me/{{$order[0]->phone_no}}/?text=get you invoice http://localhost:8000/invoice/offline/view/{{$order[0]->id}}"><i class="fa fa-solid fa-share icon-bottom"></i></a>
            </center>
            </div>
          </div>

        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
  </body>
  <script
    src="https://kit.fontawesome.com/9fafafc83d.js"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"
  ></script>
  <script src="../script/main.script.js"></script>
</html>
