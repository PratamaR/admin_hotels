<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon ">
            <i class="fa-reguler fas fa-hotel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Great Hotels</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ ($title === 'Dashboard')? 'active' : '' }}">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
     <!-- Divider -->
     @if(Auth::user()->role == 'admin')
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Rooms
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Rooms Tabel Setting</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Rooms Components:</h6>
                 <a class="collapse-item" href="/list-type">List Type Room</a>
                 <a class="collapse-item" href="/list-froome">List Facility Room</a>
                 <a class="collapse-item" href="/list-gallery">List Room Gallery</a>
                 <a class="collapse-item" href="/list-room">List Rooms</a>
                 <a class="collapse-item" href="/list-reservation">List Reservation</a>
             </div>
         </div>
     </li>
     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Hotels
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepages" aria-expanded="true" aria-controls="collapsepages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Hotels Tabel Setting</span>
         </a>
         <div id="collapsepages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Hotels Components:</h6>
                 <a class="collapse-item" href="/list-fhotel">List Facility Hotel</a>
                 <a class="collapse-item" href="/list-setting">List Hotel Setting</a>
                 <a class="collapse-item" href="/list-testimoni">List Testimoni</a>
             </div>
         </div>
     </li>

     <hr class="sidebar-divider d-none d-md-block">

     <!-- Heading -->
     <div class="sidebar-heading">
        Users
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Users Tabel Setting</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Users Components:</h6>
                <a class="collapse-item" href="/list-user">List User</a>
            </div>
        </div>
    </li>
@endif

@if(Auth::user()->role == 'user')
<hr class="sidebar-divider my-0">
        <!-- Heading -->
        <li class="nav-item {{ ($title === 'List Reservation')? 'active' : '' }}">
            <a class="nav-link" href="/list-reservation">
                <i class="fas fa-book"></i>
                <span>Reservation</span></a>
        </li>

    <hr class="sidebar-divider my-0">


        <li class="nav-item {{ ($title === 'List Testimoni')? 'active' : '' }}">
            <a class="nav-link" href="/list-testimoni">
                <i class="fas fa-comment"></i>
                <span>Testimoni</span></a>
        </li>
     @endif

  @if(Auth::user()->role == 'receptionist')
  <hr class="sidebar-divider my-0">
  <!-- Heading -->
     <li class="nav-item {{ ($title === 'List Reservation')? 'active' : '' }}">
        <a class="nav-link" href="/list-reservation">
            <i class="fas fa-book"></i>
            <span>Reservation</span></a>
    </li>
    @endif
     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
    <!-- Nav Item - Utilities Collapse Menu -->
</ul>
<!-- End of Sidebar -->
