@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Product List <span class="badge badge-pill badge-danger"> {{ count($products) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image </th>
								<th>Product Name</th>
								<th>Product Price </th>
								<th>Quantity </th>
								<th>Action</th>			 
							</tr>
						</thead>
						<tbody>
	 @foreach($products as $item)
	 <tr>
		<td> <img src="{{ asset($item->product_image) }}" style="width: 60px; height: 50px;">  </td>
		<td>{{ $item->product_title }}</td>
		 <td>{{ number_format($item->product_price, 2) }} INR </td>
		 <td>{{ $item->product_qty}} Pic</td>

		<td width="30%">
 <a href="{{route("edit.product", $item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

 <a href="{{route("delete.product", $item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>



		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->

 
 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection
