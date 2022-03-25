@extends('admin.admin_master')
@section('admin')
	  <div class="container-full">
		<section class="content">
		  <div class="row">	   
		 	<div class="col-8">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">City List <span class="badge badge-pill badge-danger"> {{ count($citys) }} </span></h3>
				</div>
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>City Name </th>
								<th>City Pincode</th>
								<th>Action</th>								 
							</tr>
						</thead>
						<tbody>
	 @foreach($citys as $item)
	 <tr>
		<td>{{ $item->city_name }}</td>
		<td>{{ $item->city_pincode }}</td>
		<td>
 <a href="{{route("city.edit",$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
 <a href="{{route("city.delete",$item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>
		</td>							 
	 </tr>
	  @endforeach
						</tbody>						 
					  </table>
					</div>
				</div>
			  </div>			          
			</div>


          <div class="col-4">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add City </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
 <form method="post" action="{{ route('city.store') }}" enctype="multipart/form-data">
	 	@csrf				   
	 <div class="form-group">
		<h5>City Name English  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="city_name" class="form-control" > 
	 @error('city_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>
	<div class="form-group">
		<h5>City Pincode  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="city_pincode" class="form-control" > 
	 @error('city_pincode') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
	</div>		 
			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">					 
						</div>
					</form>					  
					</div>
				</div>
			  </div>
			</div>
		  </div>
		</section>	  
	  </div>
@endsection