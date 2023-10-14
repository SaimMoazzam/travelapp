<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />
  <!-- <link rel="stylesheet" href="../assets/css/styles.min.css" /> -->
  <link rel="stylesheet" href="{{asset('/assets/css/styles.min.css')}}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      @include('admin.layout.sidebar')
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('admin.layout.header')
      <!--  Header End -->
      <div class="container-fluid">
        @yield('mainbody')
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Datatable -->
  <!-- <link href="{{asset('/assets/libs/DataTables/datatables.min.css')}}" rel="stylesheet">
  <script src="{{asset('/assets/libs/DataTables/datatables.min.js')}}"></script> -->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  
  <!-- <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script> -->
  <!-- <script src="../assets/js/dashboard.js"></script> -->

  @yield('script')
</body>

</html>