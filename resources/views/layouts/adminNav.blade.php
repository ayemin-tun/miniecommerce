<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark text-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler text-light" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="{{ url('products_list') }}">
                <span class="text-light"> <i class="fa-solid fa-cart-shopping"></i> Admin Panel</span>
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('products_list') }}">Products</a>
                </li>

                @if (Auth::check())
                    @if (Auth::user()->role == 'superadmin')
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ url('admin_list') }}">Admin List</a>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('products_list') }}">Contact</a>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            {{-- <!-- Icon -->
            <a class="text-reset me-3" href="{{ url('cart') }}">
                <i class="fas fa-shopping-cart"></i>
            </a> --}}
            <ul class="navbar-nav me-auto mb02 mb-lg-0">
                @if (Auth::check())
                    <li class="nav-item pt-2">
                        <a href="#" data-mdb-toggle="tooltip" title="{{ Auth::user()->role }}">
                            <span class="badge bg-secondary">
                                <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('logout') }}" class="nav-link text-white">logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ url('login') }}" class="nav-link text-white">Login</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-white">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
