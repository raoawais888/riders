<header>
   <!-- header inner -->
   <div class="header">
      <div class="container-fluid">
         <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo" style="width: 205px;height: 85px;">
                        <a href="{{url('/')}}"><img src="{{asset('frontend/images/logo_new.png')}}" alt="#" style="    height: 100%;width: 100%;object-fit: contain;" /></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 d-flex justify-content-end">
               <nav class="navigation navbar navbar-expand-md navbar-dark ">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}"> Home </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/shop')}}"> Shop </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/appointment')}}">Get Appointment</a>
                        </li>
                        <li class="nav-item">
                           @php
                           $total_cart = 0;
                           $counter = session()->get('cart');

                           if(!empty($counter)):
                           $total_cart = count($counter);
                           endif;
                           @endphp
                           <a class="nav-link cart_parent" href="{{url('/cart')}}"><i class="fa-sharp fa-solid fa-cart-shopping"> </i> <span id="counter">{{$total_cart}}</span> </a>
                        </li>
                        @if(Auth::check())
                        <li class="nav-item d_none">
                           <a class="nav-link" href="#"><i class="fa fa-user-circle padd_right" aria-hidden="true"></i>{{Auth::user()->name}}</a>
                        </li>
                        <li class="nav-item d_none">
                           <a id="logout_btn" class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                           </form>
                        </li>
                        @else
                        <li class="nav-item d_none">
                           <a class="nav-link" href="{{url('/login')}}"><i class="fa fa-user-circle padd_right" aria-hidden="true"></i>Login</a>
                        </li>
                        <li class="nav-item d_none">
                           <a class="nav-link" href="{{url('/register')}}"><i class="fa fa-user-circle padd_right" aria-hidden="true"></i>Register</a>
                        </li>
                        @endif


                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>
</header>