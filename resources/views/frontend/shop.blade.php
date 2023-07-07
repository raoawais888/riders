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
<!-- @if(session()->get('success'))

<script>
    Swal.fire({
        icon: 'success',
        title: 'Congratulation!',
        text: 'Your Appointment is done  we will contact soon !',

    })
</script>

@endif -->


<section class="breadcrumb-section set-bg" data-setbg="{{asset('frontend/images/bread1.jpg')}}" style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2> Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



{{-- form section start  --}}

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Categories</h4>
                        <ul>
                            @foreach ($category as $data )
                            <li>
                                <a href="#">{{$data->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Brands</h4>
                        <ul>
                            @foreach ($category as $data )
                            <li>
                                <a href="#">{{$data->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <!-- slider start -->
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel owl-loaded owl-drag">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-1755px, 0px, 0px); transition: all 1.2s ease 0s; width: 3510px;">
                                    @foreach($product as $data)
                                    <div class="owl-item" style="width: 292.5px;">
                                        <div class="col-lg-4">
                                            <div class="product__discount__item">
                                                <div class="product__discount__item__pic set-bg" data-setbg="{{asset('images/products/'. $data->image.'')}}" style="background-image: url(&quot;img/product/discount/pd-3.jpg&quot;);">
                                                    <div class="product__discount__percent"></div>
                                                    <ul class="product__item__pic__hover">
                                                        @if($data->quantity == 0)
                                                        <li>
                                                            <p style="color:red;">Out of Stock</p>
                                                        </li>
                                                        @else
                                                        <li><a href="{{route('add-to-cart', $data->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                                        @endif

                                                    </ul>
                                                </div>
                                                <div class="product__discount__item__text">
                                                    <span>{{$data->category->name}}</span>
                                                    <h5>{{$data->name}}</h5>
                                                        <div class="product__item__price">${{$data->price}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- slider end -->
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select style="display: none;">
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                                <div class="nice-select" tabindex="0"><span class="current">Default</span>
                                    <ul class="list">
                                        <li data-value="0" class="option selected">Default</li>
                                        <li data-value="0" class="option">Default</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                @php
                                $count = count($product)
                                @endphp
                                <h6><span>{{$count}}</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($product as $data )
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{asset('images/products/'. $data->image.'')}}" style="background-image: url(&quot;img/product/product-1.jpg&quot;);">
                                <ul class="product__item__pic__hover">
                                    @if($data->quantity == 0)
                                    <li>
                                        <p style="color:red;">Out of Stock</p>
                                    </li>
                                    @else
                                    <li><a href="{{route('add-to-cart', $data->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                    @endif

                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{$data->name}}</a></h6>
                                <h5>${{$data->price}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="cat_product_area section_gap"> 
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="product_top_bar">
                        <div class="left_dorp">
                            <select class="sorting">
                  <option value="1">Default sorting</option>
                  <option value="2">Default sorting 01</option>
                  <option value="4">Default sorting 02</option>
                </select>
                            <select class="show">
                  <option value="1">Show 12</option>
                  <option value="2">Show 14</option>
                  <option value="4">Show 16</option>
                </select>
                        </div>
                    </div>

                    <div class="latest_product_inner">
                        <div class="row">
                            
                            loop start -
                                @foreach ($product as $data )
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                         <img class="card-img-top card-image" src="{{asset('images/products/'. $data->image.'')}}" alt="..." id="product_image">
                                       
                                    </div>
                                    <div class="product-btm">
                                        <a href="#" class="d-block">
                                            <h4>{{$data->name}}</h4>
                                        </a>
                                        <div class="mt-3">
                                            
                                            <span>${{$data->price}}</span>
                                        </div>
                                        
                                         <div class="p_icon">
                                           <a class="btn btn-primary" href="{{route('add-to-cart', $data->id) }}">Add To Cart </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                     @endforeach
                             
                            loop ENd 
                            
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    
                                     @foreach ($product as $data )
                                    <li>
                                        <a href="#">{{$data->name}}</a>
                                    </li>
                                    @endforeach
                                
                                </ul>
                            </div>
                        </aside>

                       
                    </div>
                </div>
            </div>
        </div>
    </section>-->







@endsection