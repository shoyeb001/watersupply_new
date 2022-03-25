@extends('admin.admin_master')
@section('admin')
	  <div class="container-full">
		<section class="content">
		  <div class="row">	   
		 	<div class="col-8">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">City List <span class="badge badge-pill badge-danger"> {{ count($category) }} </span></h3>
				</div>
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Sl No</th>
								<th>Category Name </th>
								<th>Action</th>								 
							</tr>
						</thead>
						<tbody>
                            @php
                                $i = 0;
                            @endphp
	 @foreach($category as $item)
	 <tr>
		<td>{{$i}}</td>
		<td>{{ $item->category_name }}</td>
		<td>
 <a href="{{route("edit.category",$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
 <a href="{{route("delete.category",$item->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
 	<i class="fa fa-trash"></i></a>
		</td>							 
	 </tr>
     @php
         $i++;
     @endphp
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
 <form method="post" action="{{ route('category.add') }}" enctype="multipart/form-data">
	 	@csrf				   
	 <div class="form-group">
		<h5>Category Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="category_name" class="form-control" > 
	 @error('category_name') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	</div>
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
