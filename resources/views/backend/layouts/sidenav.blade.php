<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{asset('/frontend/images/basecrave.png')}}" style="height: auto; width: 100px;">
        </div>
        <div class="sidebar-brand-text mx-3">Base Crave</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('settings')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>
    
     <li class="nav-item">
        <a class="nav-link" href="{{route('profile')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Profile</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('about')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>About Us</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('banner')}}">
            <i class="fas fa-fw fa-image"></i>
            <span>Banner</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWelcome"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-unlock"></i>
            <span>Menu</span>
        </a>
        <div id="collapseWelcome" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu Page</h6>
                <a class="collapse-item" href="{{ route('categories') }}">Categories</a>
                <a class="collapse-item" href="{{ route('subcategories') }}">Sub Categories </a>
                <a class="collapse-item" href="{{ route('items') }}">Items</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{route('openinghour')}}">
            <i class="fas fa-fw fa-clock"></i>
            <span>Opening Hour</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('testimonial')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Testimonial</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Media
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('gallery')}}">
            <i class="fas fa-fw fa-camera"></i>
            <span>Gallery</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('media')}}">
            <i class="fas fa-fw fa-image"></i>
            <span>Media</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
