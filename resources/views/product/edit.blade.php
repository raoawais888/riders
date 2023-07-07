@extends('layouts.admin_app')
@section('main_content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('products.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i> Back</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
 
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    @if($errors->any())
        <div class="alert alert-danger">
            {!! implode('', $errors->all('
            <strong>Error!</strong> :message<br>')) !!}
        </div>
        @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')    
                        @csrf                    
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                        <label>Name <span class="required-star">*</span></label>
                                        <input type="text" class="form-control" name="name" value="{{$product->name}}"
                                           placeholder="Enter Product Name" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                        <label>Price <span class="required-star">*</span></label>
                                        <input type="number" maxlength="100" class="form-control" name="price"
                                            placeholder="Enter Product Price" value="{{ $product->price }}" required>
                                         @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                        <label>Category <span class="required-star">*</span></label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach($category as $cat)
                                            @if($product->category_id == $cat->id)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @else
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                         @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                        <label>Image <span class="required-star">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" id="image_url" class="custom-file-input" name="image_url"
                                                    accept=".png, .jpg, .jpeg" value="{{ $product->image }}"> <label
                                                    class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                        @error('image_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <img src="{{ asset('images/products/'.$product->image) }}" id="image"
                                            class="w-25 mt-2" />
                                    </div>
                                    <div class="form-group col-md-12 col-sm-6">
                                        <label>Descriptions <span class="required-star">*</span></label>
                                        <textarea name="description" id="description" cols="15" rows="2"
                                            class="form-control text-area"
                                            >{{$product->description}}</textarea>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('custom_scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result);
                    $('#image').removeClass("hidden");
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image_url").change(function () {
            readURL(this);
        });

        // Get Input File Name
        $('.custom-file input').change(function (e) {
            var files = [];
            for (var i = 0; i < $(this)[0].files.length; i++) {
                files.push($(this)[0].files[i].name);
            }
            $(this).next('.custom-file-label').html(files.join(','));
        });

        $("document").ready(function(){
            setTimeout(function(){
            $("div.alert").remove();
            }, 5000 ); // 5 secs
        });
    </script>
@endsection