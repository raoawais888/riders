@extends('frontend.master')
@section('main-content')
<style>
    .invalid-feedback {
        color: red;
    }

    .error {
        color: red;
    }

    .loader_content {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(189, 230, 237, 0.7);
        visibility: hidden;
    }
</style>
<div class="container">
    <div class="py-5 text-center">

        <h2>Checkout form</h2>
        <p class="lead">Please fill the below info.</p>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">{{$count}}</span>
            </h4>
            <ul class="list-group mb-3">
                @php $total = 0 @endphp
                @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{$details['name']}}</h6>
                        <!-- <small class="text-muted">Brief description</small> -->
                    </div>
                    <span class="text-muted">${{$details['price']}}</span>
                </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>${{$total}}</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form id="chk_form" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Required)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                </div>
                <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                </div>
                <div class="mb-3">
                    <label for="phone">Phone <span class="text-muted">(Required)</span></label>
                    <input type="text" class="form-control" id="phone" placeholder="+92 300 1234567" required>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" id="country" required>
                            <option value="">Choose...</option>
                            <option id="kuwait">Al Kuwait</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state" required>
                            <option value="">Choose...</option>
                            <option id="al-kuwait">Kuwait City</option>
                            <option id="al-jahra">Al Jahrā’</option>
                            <option id="abu-hulaya">Abū Ḩulayfah</option>
                            <option id="al-ahmadi">Al Aḩmadī</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
        <div class="loader_content">
            <img src="{{asset('frontend/images')}}/software_loading.gif" style="height: 30px; width:30px" class="mt-2">
        </div>
    </div>
</div>
@endsection
@section('custom_scripts')

<script>
    $('#chk_form').submit(function(e) {
        e.preventDefault();
        let fname = $('#firstName').val();
        let lname = $('#lastName').val();
        let email = $('#email').val();
        let address = $('#address').val();
        let country = $('#country').val();
        let state = $('#state').val();
        let zip = $('#zip').val();
        let phone = $('#phone').val();
        if (fname == '' || lname == '' || email == '' || address == '' || country == '' || state == '' || zip == '' || phone == '') {
            swal.fire("STOP!", "Please Fill all required Fields!", "error");
            return false;
        }
        $.ajax({
            url: "{{ route('doCheckout') }}",
            method: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                fname: fname,
                lname: lname,
                email: email,
                address: address,
                country: country,
                state: state,
                zip: zip,
                phone: phone
            },
            beforeSend: function() {
                $('.loader_content').css("visibility", "visible");
            },
            complete: function() {
                $(".loader_content").css("visibility", "hidden");
            },
            success: function(response) {
                if (response.cart == true && response.order == true && response.mail == 1) {
                    swal.fire("Suceess!", "Your Order Placed Successfully!!!", "success").then(function(){
                        window.location = "{{ route('cart') }}";
                    });
                    
                } else {
                    swal.fire("STOP!", "Something went wrong please try again!", "error").then(function(){
                        window.location = "{{ route('cart') }}";
                    });
                }
            }
        });
    });
</script>
<!-- checkout form script -->
@endsection