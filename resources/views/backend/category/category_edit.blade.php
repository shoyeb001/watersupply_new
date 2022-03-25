@extends('admin.admin_master')
@section('admin')
	  <div class="container-full">
		<section class="content">
		  <div class="row">
          <div class="col-12">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Category </h3>
				</div>
				<div class="box-body">
					<div class="table-responsive"> 
              <form method="post" action="{{ route('update.category', $category[0]->id) }}" enctype="multipart/form-data">
                        @csrf 
                    <input type="hidden" name="id" value="{{ $category[0]->id }}">	   

                    <div class="form-group">
                        <h5>Category Name <span class="text-danger">*</span></h5>
                        <div class="controls">
                          <input type="text"  name="category_name" class="form-control" value="{{ $category[0]->category_name }}" > 
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
