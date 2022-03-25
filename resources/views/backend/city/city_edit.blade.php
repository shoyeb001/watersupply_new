@extends('admin.admin_master')
@section('admin')
	  <div class="container-full">
		<section class="content">
		  <div class="row">
          <div class="col-12">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit City </h3>
				</div>
				<div class="box-body">
					<div class="table-responsive"> 
              <form method="post" action="{{ route('city.update') }}" enctype="multipart/form-data">
                        @csrf 
                    <input type="hidden" name="id" value="{{ $city->id }}">	   

                    <div class="form-group">
                        <h5>City Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input type="text"  name="city_name" class="form-control" value="{{ $city->city_name }}" > 
                          @error('city_name') 
                          <span class="text-danger">{{ $message }}</span>
                          @enderror 
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>City Pincode <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input type="text"  name="city_pincode" class="form-control" value="{{ $city->city_pincode }}" > 
                          @error('city_name') 
                          <span class="text-danger">{{ $message }}</span>
                          @enderror 
                        </div>
                    </div>		 
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">					 
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