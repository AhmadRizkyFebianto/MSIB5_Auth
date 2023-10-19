<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #227C9D;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <div class="sidebar-brand-icon">
        <img src="{{asset('assets/img/logo.png')}}" width="70%" alt="">
      </div>
      <div class="sidebar-brand-text" style="margin-right: 1rem;">SkyPrinting</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
      <a class="nav-link" href="{{ route('categories.index') }}">
        <i class="fas fa-folder" style="color: #ffffff;"></i>
        <span>Kategori Printer</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('printer.index') }}">
        <i class="fas fa-print" style="color: #ffffff;"></i>
        <span>Printer</span></a>
    </li>

    <hr class="sidebar-divider my-0">

    <!-- Divider -->
  </ul>
