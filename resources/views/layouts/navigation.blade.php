<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark text-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler text-light" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('home') }}">
                <span class="text-light"> <i class="fa-solid fa-cart-shopping"></i> @lang('nav.amt_online_shop')</span>
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">@lang('nav.home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('contact') }}">@lang('nav.contact')</a>
                </li>




            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">

            {{-- Language switcher --}}
            @if (LaravelLocalization::getCurrentLocale() == 'en')
            <small class="nav-item">
                <a href="{{ LaravelLocalization::getLocalizedURL('my') }}" data-mdb-toggle="tooltip" title="@lang('nav.change_lan')" class="nav-link text-white m-2" data-mdb-placement="left">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Flag_of_Myanmar.svg/2560px-Flag_of_Myanmar.svg.png" class="img-fluid rounded" alt="" srcset="" width="20px" height="20px">
                </a>
            </small>
            @endif

            @if (LaravelLocalization::getCurrentLocale() == 'my')
            <small class="nav-item">
                <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" data-mdb-toggle="tooltip" title="@lang('nav.change_lan')" class="nav-link text-white m-2" data-mdb-placement="left">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/Flag_of_Great_Britain_%28English_version%29.png" class="img-fluid rounded" alt="" srcset="" width="20px" height="20px">
                </a>
            </small>
            @endif
            {{-- end Language switcher --}}

            @if (Auth::check())

            @if (Auth::user()->role == 'user')
            <ul class="navbar-nav me-auto mb02 mb-lg-0" style="float:left;">
                <li class="nav-item pt-2">
                    <a href="{{ url('/cart') }}" style="margin-right: 20px" class="text-light">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">
                            @php
                            $userId = Auth::user()->id;
                            $result = DB::select('SELECT * FROM carts WHERE user_id = ?', [$userId]);
                            echo count($result);
                            @endphp

                        </span>
                    </a>
                </li>
                <li class="nav-item pt-2">
                    <a href="#" data-mdb-toggle="tooltip" title="{{ Auth::user()->role }}" class="text-light" data-mdb-placement="bottom">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link text-white">logout</a>
                </li>

            </ul>
            @elseif(Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
            <ul class="navbar-nav me-auto mb02 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ url('/products_list') }}" class="nav-link text-white">
                        <i class="fa fa-users"></i></a>
                </li>
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

            </ul>
            @endif
            @else
            <ul class="navbar-nav me-auto mb02 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ url('/login') }}" class="nav-link text-white">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/register') }}" class="nav-link text-white">Register</a>
                </li>
            </ul>
            @endif


        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>