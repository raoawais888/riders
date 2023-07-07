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
                            <h3 class="card-title">Edit Location Wih Price</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form  method="POST" >
                            @csrf

                            <input type="hidden" name="id" value="{{$location->id}}">

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label>Location <span class="required-star">*</span></label>
                                        <input type="text" value="{{$location->location}}" maxlength="50" class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{old('name')}}" placeholder="Enter Location Name" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label>Price <span class="required-star">*</span></label>
                                        <input type="text" value="{{$location->price}}"  class="form-control @error('price') is-invalid @enderror" name="price"
                                            value="{{old('price')}}" placeholder="Enter Product Price" required  >
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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

