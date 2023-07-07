@extends('layouts.admin_app')
@section('page_title')
 Add Product
@endsection
@section('main_content')
<style>
    .required-star{
        color: red;
    }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('products.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i>Back</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if($errors->any())
        <div class="alert alert-danger">
            {!! implode('', $errors->all('
            <strong>Error!</strong> :message<br>')) !!}
        </div>
        @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                        <label>Name <span class="required-star">*</span></label>
                                        <input type="text" maxlength="50" class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{old('name')}}" placeholder="Enter Product Name" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                        <label>Price <span class="required-star">*</span></label>
                                        <input type="number" maxlength="50" class="form-control @error('price') is-invalid @enderror" name="price"
                                            value="{{old('price')}}" placeholder="Enter Product Price" required>
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                        <label>Category <span class="required-star">*</span></label>
                                        <select name="category_id" id="category_id" class="form-control @error('category') is-invalid @enderror">
                                            @foreach($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                        <label>Image <span class="required-star">*</span></label>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" id="image_url" class="custom-file-input @error('image_url') is-invalid @enderror " name="image_url"
                                                    accept=".png, .jpg, .jpeg" required>
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                        @error('image_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <img src="" id="image" class="hidden w-25" />
                                    </div>
                                    <!-- <div class="form-group col-md-12 col-sm-6">
                                        <label>Descriptions</label>
                                        <textarea name="description" id="description" cols="15" rows="2"
                                            class="form-control text-area"
                                            >{{old('description')}}</textarea>
                                    </div> -->
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
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