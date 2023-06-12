@include('user.template.header')
{{-- @include('user.template.topbar') --}}

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('admin/logo-ogani.png') }}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="{{ route('showItem') }}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{ asset('user/img/language.png') }}" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="{{ route('detail.shop') }}">Shop</a></li>
                <li><a href="#">Transaction</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Current Transaction</a></li>
                        <li><a href="./shoping-cart.html">History</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                                <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i> </a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{ asset('user/img/language.png') }}" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <li class="dropdown user-dropdown">
                                <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                    <div class="user-toggle">
                                        <div class="user-avatar sm">
                                            <em class="icon ni ni-user-alt"></em>
                                        </div>
                                        <div class="user-info d-none d-xl-block">
                                            <div class="user-status user-status-unverified">Unverified</div>
                                            <div class="user-name dropdown-indicator"> {{ Auth::user()->name }}</div>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                    <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                        <div class="user-card">
                                            <div class="user-avatar">
                                                <span>AB</span>
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text"> {{ Auth::user()->name }}</span>
                                                <span class="sub-text"> {{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-inner">
                                        <ul class="link-list">
                                            <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                            <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                            <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                            <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown-inner">
                                        <ul class="link-list">
                                            <li><a href="{{ url('logout') }}"
                                                class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <em class="icon ni ni-signout"></em><span>{{ __('Logout') }}</span></a></li>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                        </form>

                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{ asset('admin/logo-ogani.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ url('redirect') }}">Home</a></li>
                            <li><a href="{{ route('detail.shop') }}">Shop</a></li>
                            <li class="active"><a href="#">Transaction</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{route('detail.transaction')}}">Current Transaction</a></li>
                                    <li><a href="{{route('history.transaction')}}">History</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i> </a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss='alert' aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                    @endif
                        <table class="datatable-init nowrap nk-tb-list is-separate" data-auto-responsive="false">
                            <thead>
                                <tr class="nk-tb-item nk-tb-head">
                                    <th class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="puid">
                                            <label class="custom-control-label" for="puid"></label>
                                        </div>
                                    </th>
                                    <th class="nk-tb-col"><span>ID</span></th>
                                    <th class="nk-tb-col tb-col-sm"><span>Product Name</span></th>
                                    <th class="nk-tb-col"><span>Quantity</span></th>
                                    <th class="nk-tb-col"><span>Price</span></th>
                                    <th class="nk-tb-col"><span>Payment</span></th>
                                    <th class="nk-tb-col"><span>Delivery Status</span></th>
                                    <th class="nk-tb-col"><span>Date</span></th>
                                </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                                @foreach ( $orders as $order )
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="puid1">
                                            <label class="custom-control-label" for="puid1"></label>
                                        </div>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-lead">{{$order->id}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-sm">
                                        <span class="tb-product">
                                            <img src="{{ asset('storage/'. $order->image)}}" alt="{{ asset('storage/'. $order->image)}} }}" class="thumb">
                                            <div class="user-info">
                                                <span class="tb-lead">{{$order->product_name}} <span class="dot dot-success d-md-none ms-1"></span></span>
                                            </div>
                                        </span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-lead">{{$order->quantity}}
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-sub">Rp. {{ $order->price}}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-status text-success">{{$order->payment_status}}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-status text-success">{{$order->delivery_status}}</span>
                                    </td>
                                    <td class="nk-tb-col">
                                        <span class="tb-lead">{{$order->created_at}}
                                    </td>
                                </tr><!-- .nk-tb-item -->
                                @endforeach

                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </section>
    @include('user.template.footer')
