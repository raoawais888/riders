 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
     <img src="{{asset('admin-panel/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">Admin Dashboard</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="{{asset('admin-panel/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">Web Admin</a>
       </div>
     </div>

     <!-- SidebarSearch Form -->
     <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->
     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item ">
           <a href="{{route('dashboard')}}" class="nav-link {{request()->is('admin*')?'active':''}}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
               <!-- <i class="right fas fa-angle-left"></i> -->
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a href="{{url('locations')}}" class="nav-link {{request()->is('categories*')?'active':''}}">
             <i class=" nav-icon  fa fa-map-marker" aria-hidden="true"></i>
             <p>
               Locations
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a href="{{url('model-price')}}" class="nav-link {{request()->is('model-price*')?'active':''}}">
             <i class=" nav-icon  fa fa-map-marker" aria-hidden="true"></i>
             <p>
               Model Prices
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a href="{{route('products.index')}}" class="nav-link {{request()->is('products*')?'active':''}}">
             <i class="nav-icon fab fa-product-hunt"></i>
             <p>
               Products
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{url('orders')}}" class="nav-link {{request()->is('orders*')?'active':''}}">
             <i class="nav-icon fa fa-shopping-cart"></i>
             <p>
               Orders
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{route('categories.index')}}" class="nav-link {{request()->is('categories*')?'active':''}}">
             <i class="nav-icon fa fa-list-alt"></i>
             <p>
               Categories
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{route('brands.index')}}" class="nav-link {{request()->is('brands*')?'active':''}}">
             <i class="nav-icon fab fa-superpowers"></i>
             <p>
               Brand
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{route('carmodels.index')}}" class="nav-link {{request()->is('carmodels*')?'active':''}}">
             <i class="nav-icon fa fa-car"></i>
             <p>
               Car Model
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{route('caryears.index')}}" class="nav-link {{request()->is('caryears*')?'active':''}}">
             <i class="nav-icon fa fa-calendar"></i>
             <p>
               Car Year
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="{{route('price.index')}}" class="nav-link {{request()->is('price*')?'active':''}}">
             <i class="nav-icon fa fa-credit-card"></i>
             <p>
               CheckUp Price
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a href="{{url('/allappoinments')}}" class="nav-link {{request()->is('appointments*')?'active':''}}">
             <i class="nav-icon fa fa-address-card"></i>
             <p>
               Appointments
             </p>
           </a>
         </li>
         <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>
