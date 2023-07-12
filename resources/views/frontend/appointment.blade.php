@extends('frontend.master')
@section('main-content')


@if(session()->get('limiterror'))

<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops sorry...',
        text: 'today Appoinment reservetion full please try  tommorow !',

    })
</script>

@endif

@if(session()->get('emailerror'))

<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops sorry...',
        text: 'Email not send Contact us on later On!',

    })
</script>

@endif
@if(session()->get('success'))

<script>
    Swal.fire({
        icon: 'success',
        title: 'Congratulation!',
        text: 'Your Appointment is done  we will contact soon !',

    })
</script>

@endif

{{-- form section start  --}}
<div class="container my-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="titlepage">
                <h2>Appoinment </h2>
            </div>
        </div>
    </div>

    <form action="" method="POST" id="form">
        @csrf
        <div class="row">


            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="">Full Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="number" id="mobile_code" class="form-control" placeholder="Phone Number" name="number" minlength="10" maxlength="10" required>

                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
            </div>


            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <label for="">Date</label>
                    <input name="date" class="form-control" id="date" placeholder="dd/mm/yy" autocomplete="off">
                </div>
            </div>


            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <label for="">Time</label>
                    <select name="time" class="form-control" class="form-control" id="time">

                        <option value="11 AM">11 AM</option>
                        <option value="12 PM">12 PM</option>
                        <option value="1 PM">1 PM</option>
                        <option value="2 PM">2 PM</option>
                        <option value="3 PM">3 PM</option>
                        <option value="4 PM">4 PM</option>
                        <option value="5 PM">5 PM</option>
                        <option value="6 PM">6 PM</option>
                        <option value="7 PM">7 PM</option>
                        <option value="8 PM">8 PM</option>
                        <option value="9 PM">9 PM</option>
                        <option value="10 PM">10 PM</option>

                    </select>

                </div>
            </div>


            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="">Vehicle Brand</label>
                    <select name="brand" id="brand" class="form-control">

                        <option value="" disabled selected>Select Brand</option>

                        @foreach ($brand as $data )
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group col-md-4 mt-3">

                <label>Select Model <span class="required-star">*</span></label>
                <div id="model">
                    <select class="form-control" name="car_id">
                        <option value="" disabled>Select Model</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4 mt-3">

                <label>Select Year <span class="required-star">*</span></label>
                <div id="years">
                    <select class="form-control" id="caryear_id">
                        <option value="" disabled>Select Year</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label for="">Advance (Price in K.D)</label>
                    <input type="text" id="check_price" name="advance" class="form-control" readonly value="{{$price->price}}">
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <input type="checkbox" name="normal" id="normal_price" value="normal service">
                    <label for="">Normal Services</label>
                </div>
            </div>

            <div class="hide_field w-100">
                <div class="row pl-3">
                    <div class="col-md-6 mt-3">
                        <div class="form-group ">
                            <input type="radio" name="service" id="service" value="with spare parts which includes Change oil – change air filter – change plugs Price include with labor charges price"> (with spare parts which includes
                            Change oil – change air filter – change plugs
                            Price include with labor charges (price)
                            )

                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <input type="radio" name="service" id="service" value="without spare part Only labor charges price"> ( without spare part
                            Only labor charges (price)

                            )

                        </div>
                    </div>


                </div>
            </div>


            <div class="col-md-12 mt-3">
                <div class="form-group">

                    <input type="checkbox" name="checkup" id="major_price" value="checkup">
                    <label for="">Checkup</label>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label for="">Service Price (Price in K.D)</label>
                    <input type="text" id="service_price" name="service_price" class="form-control" readonly="" value="">
                </div>
            </div>

            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <label for="">Location</label>
                    <select name="location" id="location" class="form-control">
                        <option value="" selected disabled>Select Locaion</option>
                        @foreach ($location as $data )

                        <option value="{{$data->id}}">{{$data->location}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2 mt-3">
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control" readonly id="price">
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <label for="">Total Price : Check UP + Price</label>
                    <input type="number" name="total_price" class="form-control" readonly id="total_price">
                </div>
            </div>

            <div class="col-md-12">
                <button class="send_btn m-auto">Get Appointment</button>
            </div>


        </div>

    </form>


</div>
{{-- form section end  --}}
@endsection
@section('custom_scripts')
<script>
    $(document).ready(function() {
        var brand, model, caryear = '';
        // console.log(brand + model + caryear);
        $("#brand").on("change", function() {

            brand = $(this).val();
            $.ajax({
                url: "{{url('/model-fetch')}}",
                data: {
                    brand
                },
                success: function(data) {
                    $("#model").html(data);
                }
            });

        });


        // year get by model


        $(document).on("change", "#car_model", function() {
            model = $(this).val();
            $.ajax({
                url: "{{url('/year-fetch')}}",
                data: {
                    model
                },
                success: function(data) {
                    $("#years").html(data);
                }
            });

        });

        $(document).on("change", "#caryear_id", function() {
            caryear = $(this).val();
        });

        $("#normal_price").on("click", function() {
            if (brand == '' || model == '' || caryear == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops sorry...',
                    text: 'Please Select Car Brand, Model and Year first!',

                });
                $('#normal_price').prop('checked', false);
            }
            if ($('#normal_price').is(':checked')) {
                $("#service_price").val('');
                $(".hide_field").slideDown(500);
                $(document).on('change', '#service', function() {
                    $.ajax({
                        url: "{{url('/price-fetch')}}",
                        data: {
                            brand,
                            model,
                            caryear
                        },
                        success: function(data) {
                            $("#service_price").val(data);
                        }
                    });
                });

            } else {
                $(".hide_field").slideUp(500);
            }
        });
        $("#major_price").on("click", function() {
            if (brand == '' || model == '' || caryear == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops sorry...',
                    text: 'Please Select Car Brand, Model and Year first!',

                });
                $('#major_price').prop('checked', false);
            }
            $("input:radio[name='service']").removeAttr("checked");
            if ($('#major_price').is(':checked')) {
                $(".hide_field").slideUp(500);
                let checkup = 'chekup';
                $.ajax({
                    url: "{{url('/price-fetch')}}",
                    data: {
                        checkup,
                        brand,
                        model,
                        caryear
                    },
                    success: function(data) {
                        $("#service_price").val(data);
                    }
                });
            } else {
                $("#service_price").val('');
            }

        });
        $("#location").on("change", function() {

            let location = $(this).val();

            $.ajax({

                url: "{{url('location_price')}}",
                data: {
                    location
                },
                success: function(data) {

                    let check_price = $("#check_price").val();
                    let service_price = $("#service_price").val();
                    let total_price = parseInt(check_price) + parseInt(service_price) + parseInt(data);
                    $("#price").val(data);
                    $("#total_price").val(total_price);
                }


            })

        });
    });
</script>
@endsection