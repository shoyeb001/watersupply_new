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
    <link rel="stylesheet" href="{{asset("backend2/styles/search-bill.css")}}" />
    <title>Document</title>
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
          <img src="../Image/water-logo.png" alt="" width="40" height="60" />
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
              <a class="nav-link active" aria-current="page" href="{{route("admin2.logout")}}">
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
            <a href="{{route("admin2.index")}}" class="p-2"
              ><i class="fa fa-chart-line"></i> Dashboard</a
            >
          </li>
          <li>
            <a href="{{route("add.customer")}}" class="p-2"
              ><i class="fa fa-file-invoice"></i> Create Bill</a
            >
          </li>
          <li>
            <a href="{{route("view.credits")}}" class="p-2"><i class="fa fa-inr"></i> View Credits</a>
        </li>
        <li>
          <a href="{{route("view.delivery")}}" class="p-2"><i class="fa fa-truck"></i> View Delivery</a>
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
             <center><h3 class="fw-bold">Add new Item</h3>
            <h6 class="number">Create new bill</h6>
            </center> 
             
            </div>
          </div>

          <div class="back mt-4 p-4">

          <label for="party-name" class="form-label">Search by name or code <span style="color: red;">*</span></label>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Enter name or code" aria-label="Username" aria-describedby="basic-addon1"> <br>
         
          </div>
<!-- <div class="text-left"> -->
          <button type="button" class="btn btn-secondary add-btn p-3 float-end" ><i class="fa fa-plus"> Create new item </i></button>
        <!-- </div> -->
<hr class="hr">

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form action="{{route("order.store")}}" method="POST">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">  <i class="fa fa-solid fa-arrow-left"></i> Water Jar 20L</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Price & Discounts</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Other Details</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="input-group mb-1">
                          <label for="exampleInputEmail1" class="form-label">New Price (with Tax)</label>
                          <div class="input-group mb-1">
                            <span class="input-group-text" id="basic-addon1">	&#8377</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="price">
                            <input type="hidden" name="order_id" value="{{$id}}" id="order_id">
                            <input type="hidden" name="product_id" id="product_id">
                          </div>
                        </div>
                        @csrf
                        <div class="mb-1">
                          <label for="exampleInputEmail1" class="form-label">Address</label>
                          <div class="input-group mb-1">
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="address">
                            <span class="input-group-text" id="basic-addon1"></span>
                          </div>
                        </div>
                        <div class="mb-1">
                          <label for="exampleInputEmail1" class="form-label">Phone No</label>
                          <div class="input-group mb-1">
                            <input type="number" class="form-control" aria-describedby="basic-addon1" name="phone_no">
                            <span class="input-group-text" id="basic-addon1"></span>
                          </div>
                        </div>
                        <div class="mb-1">
                          <label for="exampleInputEmail1" class="form-label">Quantity</label>
                          <div class="input-group mb-1">
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="quantity">
                            <span class="input-group-text" id="basic-addon1">PCS</span>
                          </div>
                        </div>
                        <div class="mb-1">
                          <label for="exampleInputEmail1" class="form-label">Discount</label>
                          <div class="input-group mb-1">
                            <input type="text" class="form-control" aria-describedby="basic-addon1" name="discount">
                            <span class="input-group-text" id="basic-addon1">%</span>
                          </div>
                        </div>
                      {{--  <div class="mb-1">
                          <label for="exampleInputEmail1" class="form-label">Tax rate</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="tax">
                        </div>--}}
                       {{-- <table class="table table-borderless price-table">
                          <tr>
                            <td>Total Exclusive price * Qty : </td>
                            <td>&#8377 60</td>
                          </tr>
                          <tr>
                            <td>Tax rate : </td>
                            <td>&#8377 0.0 (0.0%)</td>
                          </tr>
                          <tr>
                            <td>Discount : </td>
                            <td>&#8377 0.0 (0.0%)</td>
                          </tr>
                          <tr class="fw-bold">
                            <td>Total Amount : </td>
                            <td>&#8377 60</td>
                          </tr>
                        </table>--}}
                      </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Done</button>
                </div>
              </form>
              </div>
            </div>
          </div>

        <!-- <button type="button" class="btn btn-secondary add-btn p-2"><i class="fa fa-plus"> Create new item </i></button> -->
      
        <div class="add-item-content">
          @foreach ($products as $item)
          <div class="card m-2 shadow">
            <div class="card-body">
             <div class="row">
                 <div class="col-sm-12 col-md-12 col-lg-1">
                   <h4 class="s-no p-3">1</h4>
                 </div>

                 <div class="col-sm-12 col-md-6 col-lg-9">
                     <p class="card-title" >{{$item->product_title}} </p>
                     <div class="btn-group">
                        <button  class="dropdown-toggle price no-btn" data-bs-toggle="dropdown" aria-expanded="false">
                            &#8377 {{$item->product_price}} /L
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Separated link</a></li>
                        </ul>
                      </div>
                      <p class="bill-no"> stock : {{$item->product_quantity}} P </p>
                 </div>
                 <input type="hidden" value="{{$item->id}}" id="{{$item->id}}">
                
               
                 <div class="col-sm-12 col-md-6 col-lg-2 mt-lg-4">
                    <button type="button" class="btn btn-outline-success add fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="AddProduct({{$item->id}})">ADD <i class="fa fa-plus add-icon"></i></button>
                 </div>
             
             </div>
            </div>
          </div>
@endforeach


                
        </div>


        </div>

        </div>
      </div>
      <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
  </body>
  <script type="text/javascript">
    function AddProduct(id){
     var a=  document.getElementById(id).value;
     document.getElementById("product_id").value = a;
    }
 </script>
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
  <script src="{{asset("backend2/script/main.script.js")}}"></script>
  
</html>
