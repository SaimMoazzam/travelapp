<!-- Sidebar scroll--> 
<div>
  <div class="brand-logo d-flex align-items-center justify-content-between">
    <a href="./index.html" class="text-nowrap logo-img">
      <img src="{{asset('assets/images/logos/dark-logo.svg')}}" width="180" alt="" />
    </a>
    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
      <i class="ti ti-x fs-8"></i>
    </div>
  </div>
  <!-- Sidebar navigation-->
  <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
      <!-- <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Home</span>
      </li> -->
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{route('admin.dashboard')}}" aria-expanded="false">
          <span>
            <!-- <i class="ti ti-layout-dashboard"></i> -->
          </span>
          <span class="hide-menu">@yield('firstLinkName')</span>
        </a>
      </li>
      
      <!-- SERVICES -->
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Services</span>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{route('admin.hotels')}}" aria-expanded="false">
          <span>
            <!-- <i class="ti ti-layout-dashboard"></i> -->
          </span>
          <span class="hide-menu">Hotel</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="Cab" aria-expanded="false">
          <span>
            <!-- <i class="ti ti-layout-dashboard"></i> -->
          </span>
          <span class="hide-menu">Cab</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="Tour" aria-expanded="false">
          <span>
            <!-- <i class="ti ti-layout-dashboard"></i> -->
          </span>
          <span class="hide-menu">Tour</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="Rental" aria-expanded="false">
          <span>
            <!-- <i class="ti ti-layout-dashboard"></i> -->
          </span>
          <span class="hide-menu">Rental</span>
        </a>
      </li>

    </ul>
  </nav>
  <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
