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
             <center><h3 class="fw-bold">Create bill / Invoice </h3>
            <h6 class="number">create new bill</h6>
            </center> 
             
            </div>
          </div>
          <div class="back mt-4 p-4">
          <form method="POST" action="{{route("store.customer")}}">
            @csrf
          <label for="party-name" class="form-label">Party Name <span style="color: red;">*</span></label>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="customer_name" placeholder="Enter Party name" aria-label="Username" aria-describedby="basic-addon1">
           <button type="submit" class="btn btn-primary">Add</button>
        </div>
          </form>

          <div class="card m-2 shadow">
            <div class="card-body">
             <div class="row">
                 <div class="col-sm-12 col-md-12 col-lg-1">
                    <i class="fa fa-file-invoice p-4 file-icon"></i>
                 </div>

                 <div class="col-sm-12 col-md-6 col-lg-10">
                     <p class="card-title">188 Grand Street, 2nd & 3rd Floor, New York, NY 10013 </p>
                     <p class="bill-no">7767364353 </p>
                 </div>
                 <div class="col-sm-12 col-md-6 col-lg-1">
                     <p class="price">&#8377 25</p>
                 </div>
             </div>
            </div>
          </div>


          <div class="card m-2 shadow">
            <div class="card-body">
             <div class="row">
                 <div class="col-sm-12 col-md-12 col-lg-1">
                    <i class="fa fa-file-invoice p-4 file-icon"></i>
                 </div>

                 <div class="col-sm-12 col-md-6 col-lg-10">
                     <p class="card-title">188 Grand Street, 2nd & 3rd Floor, New York, NY 10013 </p>
                     <p class="bill-no">7767364353 </p>
                 </div>
                 <div class="col-sm-12 col-md-6 col-lg-1">
                     <p class="price">&#8377 25</p>
                 </div>
             </div>
            </div>
          </div>


          <div class="card m-2 shadow">
            <div class="card-body">
             <div class="row">
                 <div class="col-sm-12 col-md-12 col-lg-1">
                    <i class="fa fa-file-invoice p-4 file-icon"></i>
                 </div>

                 <div class="col-sm-12 col-md-6 col-lg-10">
                     <p class="card-title">188 Grand Street, 2nd & 3rd Floor, New York, NY 10013 </p>
                     <p class="bill-no">7767364353 </p>
                 </div>
                 <div class="col-sm-12 col-md-6 col-lg-1">
                     <p class="price">&#8377 25</p>
                 </div>
             </div>
            </div>
          </div>


          <div class="card m-2 shadow">
            <div class="card-body">
             <div class="row">
                 <div class="col-sm-12 col-md-12 col-lg-1">
                    <i class="fa fa-file-invoice p-4 file-icon"></i>
                 </div>

                 <div class="col-sm-12 col-md-6 col-lg-10">
                     <p class="card-title">188 Grand Street, 2nd & 3rd Floor, New York, NY 10013 </p>
                     <p class="bill-no">7767364353 </p>
                 </div>
                 <div class="col-sm-12 col-md-6 col-lg-1">
                     <p class="price">&#8377 25</p>
                 </div>
             </div>
            </div>
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
  <script src="{{("backend2/script/main.script.js")}}"></script>
</html>
