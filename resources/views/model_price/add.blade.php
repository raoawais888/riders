@extends('layouts.admin_app')
@section('page_title')
 Add Category
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
                    <h1>Manage Price</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="" class="btn btn-success"><i class="fas fa-arrow-left"></i>Back</a>
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
                            <h3 class="card-title">Add Price</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('model-price-add')}}" method="POST" >
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label>Select Brand <span class="required-star">*</span></label>
                                        <select name="brand_id" id="brand" class="form-control">
                                            <option  disabled selected>Select Brand</option>
                                            @foreach($brand as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">

                                        <label>Select Model <span class="required-star">*</span></label>
                                        <div id="model">
                                            <section class="form-control">
                                            </section>
                                        </div>


                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">

                                        <label>Select year <span class="required-star">*</span></label>
                                        <div id="years">
                                            <section class="form-control">
                                            </section>
                                        </div>


                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label>Normal Service price <span class="required-star">*</span></label>
                                        <input type="number" maxlength="50" class="form-control @error('name') is-invalid @enderror" name="normal_service"
                                            value="{{old('name')}}" placeholder="Enter Price" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label>Checkup price <span class="required-star">*</span></label>
                                        <input type="number" maxlength="50" class="form-control @error('name') is-invalid @enderror" name="checkup"
                                            value="{{old('name')}}" placeholder="Enter Price" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


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

        $(document).ready(function(){
            $("#brand").on("change",function(){

                let brand = $(this).val();

                $.ajax({
                    url:"{{url('/model-fetch')}}",
                    data:{brand},
                    success:function(data){
                       $("#model").html(data);
                    }
                })

            })


            // year get by model


            $(document).on("change", "#car_model",function(){

                let model = $(this).val();
                $.ajax({
                    url:"{{url('/year-fetch')}}",
                    data:{model},
                    success:function(data){
                       $("#years").html(data);
                    }
                })

            })



            })




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
