<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-ekOryaXPbeCpWQNxMwSWVvQ0+1VrStoPJq54shlYhR8HzQgig1v5fas6YgOqLoKz" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('library/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">
    @yield('css')
    <style>
    .sidebar-dark #sidebarToggle::after {
        color: rgba(255,255,255,.5);
        display:none !important;
    }
    </style>
</head>
<body id='page-top'>
      @guest
          @yield('login')
      @else
        <div id="wrapper">
        
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"  style="background: #001757;" id="accordionSidebar">
   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin/home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
   <!-- Divider -->
   <hr class="sidebar-divider my-0">
   <!-- Nav Item - Dashboard -->
   <li class="nav-item ">
      <a class="nav-link" href="{{ url('/admin/manage') }}" >
      <i class="fas fa-user-friends"></i>
      <span>Quản lí nhân viên</span>
      </a>
   </li>

   <hr class="sidebar-divider my-0">
   <!-- Nav Item - Dashboard -->
   <li class="nav-item ">
      <a class="nav-link" href="{{ url('/admin/home') }}" >
      <i class="fas fa-user-friends"></i>
      <span>Thông tin hội thoại</span>
      </a>
   </li>

   <hr class="sidebar-divider my-0">
   <!-- Nav Item - Dashboard -->
   <li class="nav-item ">
      <a class="nav-link" href="{{ url('/admin/profile') }}" >
      <i class="fas fa-user-friends"></i>
      <span>Thông tin cá nhân</span>
      </a>
   </li>

   <hr class="sidebar-divider my-0">
   <!-- Nav Item - Dashboard -->
   <li class="nav-item ">
      <a class="nav-link" href="{{ url('admin/customer') }}" >
      <i class="fas fa-phone-volume"></i>
      <span>Danh sách khách hàng đăng kí</span>
      </a>
   </li>
   <hr class="sidebar-divider my-0">
   <!-- Nav Item - Dashboard -->
   <li class="nav-item ">
      <a class="nav-link" href="{{ url('/admin/code') }}" >
      <i class="fas fa-user-friends"></i>
      <span>Lấy code nhúng</span>
      </a>
   </li>

   <hr class="sidebar-divider d-none d-md-block">
   <div class="text-center d-none d-md-inline">
      <button style="background:none;"class="btn " id="sidebarToggle"><i style="color:#decece" class="fa fa-bars"></i></button>
   </div>
</ul>
<div id="content-wrapper" class="d-flex flex-column">
   <!-- Main Content -->
   <div id="content">
      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
         <!-- Sidebar Toggle (Topbar) -->
         <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
         <i class="fa fa-bars"></i>
         </button>
         <!-- Topbar Search -->
         <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
               <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
               <div class="input-group-append">
                  <button class="btn btn-primary"  style ="margin-left:30px" type="button"> Tìm kiếm </button>
               </div>
            </div>
         </form> -->
         <!-- Topbar Navbar -->
         <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
               <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-search fa-fw"></i>
               </a>
               <!-- Dropdown - Messages -->
               <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100 navbar-search">
                     <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                           <button class="btn btn-primary" type="button">
                           <i class="fas fa-search fa-sm"></i>
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
               <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
               <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
               </a>
               <!-- Dropdown - User Information -->
               <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                  </a>
               </div>
            </li>
         </ul>
      </nav>
          @yield('content')
   </div>
   <footer class="sticky-footer bg-white">
      <div class="container my-auto">
         <div class="copyright text-center my-auto">
            <span>Copyright &copy; By Văn Thạo</span>
         </div>
      </div>
   </footer>
</div>
</div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Bạn có sẵn sàng đăng xuất</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">Đăng xuất khỏi trang web</div>
         <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary " href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
            </form>
         </div>
      </div>
   </div>
</div>
        </div>
      @endguest
</body>
  <script src="{{ asset('library/jquery.min.js') }}"></script>
  <script src="{{ asset('library/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('library/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('library/sb-admin-2.min.js') }}"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  @yield('jsScript')
</html>
