<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
    <title>Invoice-pdf</title>
  </head>
  <body>
      <!-- Sidebar -->
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
        </div>
      </div>
      <!-- /#page-content-wrapper -->
  </body>
</html>
