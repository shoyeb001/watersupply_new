@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Product </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{route("update.product")}}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product[0]->id }}">
                                <div class="row">
                                    <div class="col-12">


                                        <div class="row">
                                            <!-- start 1st row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="product_brand" class="form-control">
                                                            <option value="" selected="">Select Brand</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}" {{$product[0]->product_brand == $brand->id ? "selected":" "}}>
                                                                    {{ $brand->brand_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('product_brand')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="product_category" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Category
                                                            </option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}" {{$product[0]->product_category == $category->id ? "selected": ""}}>
                                                                    {{ $category->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('product_category')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 1st row  -->



                                        <div class="row">
                                            <!-- start 2nd row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Product Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name" value="{{$product[0]->product_title}}" class="form-control"
                                                            required="">
                                                        @error('product_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty" value="{{$product[0]->product_qty}}" class="form-control"
                                                            required="">
                                                        @error('product_qty')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 2nd row  -->

                                        <div class="row">
                                            <!-- start 5th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Product Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="number" value="{{$product[0]->product_price}}" name="product_price" class="form-control"
                                                            required="" step=0.01>
                                                        @error('product_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->
                                        </div>


                                        <div class="row">
                                            <!-- start 7th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Short Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_descp" id="textarea" class="form-control"
                                                            required placeholder="Textarea text">{{$product[0]->short_description}}</textarea>
                                                    </div>
                                                </div>
                                            </div> <!-- end col md 6 -->
                                        </div> <!-- end 7th row  -->





                                        <div class="row">
                                            <!-- start 8th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Long Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="long_descp" rows="10" cols="80"
                                                            required="">
                                                             {!! $product[0]->long_description !!}
                                                        </textarea>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->
                                        </div> <!-- end 8th row  -->


                                        <hr>



                                        <div class="col-md-6">



                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                    value="Update">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

        <!-- ///////////////// Start Thambnail Image Update Area ///////// -->

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Product Thambnail Image <strong>Update</strong></h4>
                        </div>


                        <form method="post" action="{{route("product.image.update")}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $product[0]->id }}">
                            <input type="hidden" name="old_img" value="{{ $product[0]->product_image }}">

                            <div class="row row-sm">

                                <div class="col-md-3">

                                    <div class="card">
                                        <img src="{{ asset($product[0]->product_image) }}" class="card-img-top"
                                            style="height: 130px; width: 280px;">
                                        <div class="card-body">

                                            <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span
                                                        class="tx-danger">*</span></label>
                                                <input type="file" name="product_image" class="form-control"
                                                    onChange="mainThamUrl(this)">
                                                <img src="" id="mainThmb">
                                            </div>
                                            </p>

                                        </div>
                                    </div>

                                </div><!--  end col md 3		 -->


                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>
                            <br><br>



                        </form>





                    </div>
                </div>



            </div> <!-- // end row  -->

        </section>
        <!-- ///////////////// End Start Thambnail Image Update Area ///////// -->









    </div>





    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });



            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subsubcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });


        });
    </script>


    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element 
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>




@endsection
