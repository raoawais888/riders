@extends('frontend.master')
@section('main-content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend/images/bread1.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Shoping Cart Section Begin -->
@if(session('cart'))
<section class="shoping-cart spad" id="cart_exist">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'];
                            $max_qty = App\Models\Product::where('id',$id)->pluck('quantity');
                            @endphp

                            <tr data-id="{{$id}}">
                                <input type="hidden" id="maxVal" value="{{$max_qty[0]}}">
                                <td class="shoping__cart__item">
                                    <img src="{{asset('images/products/'.$details['image'].'') }}" alt="" height="50px" width="50px">
                                    <h5>{{ $details['name'] }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{ $details['price'] }}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="number" value="{{$details['quantity']}}" class="pquantity" readonly>
                                        </div>
                                    </div>
                                </td>

                                <td class="shoping__cart__total">
                                    ${{ $details['price'] * $details['quantity'] }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <i class="fa fa-circle-xmark" id="remove_cart"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{url('/shop')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6 ml-auto">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span id="subTotal">${{ $total }}</span></li>
                        <li>Total <span id="Total">${{ $total }}</span></li>
                    </ul>
                    <a href="{{url('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center">
                        <img src="{{asset('images/products')}}/empty.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4>
                        <a href="{{url('/shop')}}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="container-fluid" id="empty_cart">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center">
                        <img src="{{asset('images/products')}}/empty.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4>
                        <a href="{{url('/shop')}}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shoping Cart Section End -->
@endsection