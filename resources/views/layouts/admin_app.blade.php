<!DOCTYPE html>
<html lang="en">
<!-- head section start -->
@include('layouts.admin_partials.header')
<!-- head section end -->
  @yield('custom_style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

  <!-- header section (including Navbar) start -->
  @include('layouts.admin_partials.navbar')
  <!-- header section (including Navbar) end -->
  
  <!-- Sidebar content start -->
  @include('layouts.admin_partials.sidebar')
  <!-- Sidebar content end -->

  <!-- main_content Start -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('main_content')
    </div>
    <!-- /.content-wrapper -->
  <!-- main_content end -->

  <!-- Footer Section start -->
    @include('layouts.admin_partials.footer')
  <!-- Footer Section end -->
  </div>
  <!-- ./wrapper -->

  <!-- Script Section start -->
    @include('layouts.admin_partials.scripts')
  <!-- Script Section end -->
  @yield('custom_scripts')
</body>
</html>
