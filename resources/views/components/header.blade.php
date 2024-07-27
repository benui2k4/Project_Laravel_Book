<header>
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Ếch Con</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}"> Trang Chủ <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('contact') }}"> Liên Hệ<span
                                class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <div>
                    <a href="{{route('cart.view')}}"> <i class="fa-solid fa-cart-plus p-3 text-white"></i></a>
                </div>

                @if (auth('cus')->check())
                <div>
                    <a href="{{ route('profile') }}" class="flex-c-m trans-04 p-lr-25 text-white">
                        {{auth('cus')->user()->name}}
                    </a>
                </div>

                <div>
                    <a href="{{ route('logout') }}" class="flex-r-m trans-04 p-lr-25 text-white pl-3">Logout</a>
                </div>
                @else
                <div>
                    <a href="{{ route('login') }}" class="flex-c-m trans-04 p-lr-25 text-white ">Login</a>
                </div>

                <div>
                    <a href="{{ route('register') }}" class="flex-r-m trans-04 p-lr-25 text-white pl-3">Register</a>
                </div>
                @endif
            </div>
        </div>
    </nav>

</header>