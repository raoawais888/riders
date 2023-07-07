@extends('frontend.master')
@section('main-content')


<!-- header -->

      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
        <div id="banner1" class="carousel slide" data-ride="carousel">
           <ol class="carousel-indicators">
              <li data-target="#banner1" data-slide-to="0" class="active"></li>
              <li data-target="#banner1" data-slide-to="1"></li>
              <li data-target="#banner1" data-slide-to="2"></li>
           </ol>
           <div class="carousel-inner">
              <div class="carousel-item active">
                 <img src="{{asset('frontend/images/Boat.jpg')}}" alt="#"/>
              </div>
              <div class="carousel-item">
                 <img src="{{asset('frontend/images/Jetski.jpg')}}" alt="#"/>
              </div>
              <!--<div class="carousel-item">-->
              <!--   <div class="container-fluid">-->
              <!--      <div class="carousel-caption">-->
              <!--         <div class="row">-->
              <!--            <div class="col-md-6">-->
              <!--               <div class="text-bg">-->
              <!--                  <h1>Welcome</h1>-->
              <!--                  <span>car repair services</span>-->
              <!--                  <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, </p>-->
              <!--                  <a href="#">More Info </a> <a href="#">Contact Us</a>-->
              <!--               </div>-->
              <!--            </div>-->
              <!--            <div class="col-md-6">-->
              <!--               <div class="text_img">-->
              <!--                  <figure><img src="{{asset('frontend/images/car.png')}}" alt="#"/></figure>-->
              <!--               </div>-->
              <!--            </div>-->
              <!--         </div>-->
              <!--      </div>-->
              <!--   </div>-->
              <!--</div>-->
           </div>
           <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
           <i class="fa fa-chevron-left" aria-hidden="true"></i>
           </a>
           <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
           <i class="fa fa-chevron-right" aria-hidden="true"></i>
           </a>
        </div>
     </section>
     <!-- end banner -->
     <!-- three_box -->
     <div class="three_box">
        <div class="container">
           <div class="row">
              <div class="col-md-8 mx-auto">
                 <div class="box_text">
                    <h3>AUTO DIAGNOSE</h3>
                    <i><img src="{{asset('frontend/images/scoter.jpg')}}" alt="#"/></i>
                    <p>Maintenance company in kuwait for ATV - JET SKI - MARINE BOAT SERVICE</p>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- three_box -->
     <!-- wedo  section -->
     <div class="wedo ">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h2>What We Do</h2>
                    <p>It is a long established fact that a reader will be distracted by the </p>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-md-10 offset-md-1">
                 <div class="row">
                    <div class="col-md-6 margin_bottom">
                       <div class="work">
                          <figure><img src="{{asset('frontend/images/img1.png')}}" alt="#" /></figure>
                       </div>
                       <div class="work_text">
                          <h3>Quick repair<br><span class="blu">Total Service</span></h3>
                       </div>
                    </div>
                    <div class="col-md-6 margin_bottom">
                       <div class="work">
                          <figure><img src="{{asset('frontend/images/img2.png')}}" alt="#" /></figure>
                       </div>
                       <div class="work_text">
                          <h3>Quick repair<br><span class="blu">Total Service</span></h3>
                       </div>
                    </div>
                    <div class="col-md-6 margin_bottom">
                       <div class="work">
                          <figure><img src="{{asset('frontend/images/img3.png')}}" alt="#" /></figure>
                       </div>
                       <div class="work_text">
                          <h3>Quick repair<br> <span class="blu">Total Service</span></h3>
                       </div>
                    </div>
                    <div class="col-md-6 margin_bottom">
                       <div class="work">
                          <figure><img src="{{asset('frontend/images/img4.png')}}" alt="#" /></figure>
                       </div>
                       <div class="work_text">
                          <h3>Quick repair<br><span class="blu">Total Service</span></h3>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- end wedo  section -->
     </div>


@endsection
