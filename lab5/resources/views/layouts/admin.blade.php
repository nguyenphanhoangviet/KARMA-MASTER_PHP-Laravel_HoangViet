<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/star.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @yield('styles')
</head>

<body>
    <div class="">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Karma-Master</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.index') }}">
                        <span class="icon">
                            <ion-icon name="person-circle-outline"></ion-icon>
                        </span>
                        <span class="title">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.brands.index') }}">
                        <span class="icon">
                            <ion-icon name="sync-outline"></ion-icon>
                        </span>
                        <span class="title">Brands</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.colors.index') }}">
                        <span class="icon">
                            <ion-icon name="color-palette-outline"></ion-icon>
                        </span>
                        <span class="title">Colors</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}">
                        <span class="icon">
                            <ion-icon name="list-outline"></ion-icon>
                        </span>
                        <span class="title">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}">
                        <span class="icon">
                            <ion-icon name="cube-outline"></ion-icon>
                        </span>
                        <span class="title">Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.reviews.index') }}">
                        <span class="icon">
                            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                        </span>
                        <span class="title">Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.comments.index') }}">
                        <span class="icon">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </span>
                        <span class="title">Comments</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.sizes.index') }}">
                        <span class="icon">
                            <ion-icon name="expand-outline"></ion-icon>
                        </span>
                        <span class="title">Size</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.order-details.index') }}">
                        <span class="icon">
                            <ion-icon name="reader-outline"></ion-icon>
                        </span>
                        <span class="title">Order Details</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li> --}}
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label class="label-icon">
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="{{ asset('imgs/img-layouts/customer01.jpg') }}" alt="">
                </div>
            </div>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="details">
                @yield('content')

                {{-- <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="{{ asset('imgs/img-layouts/customer02.jpg') }}" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="{{ asset('imgs/img-layouts/customer01.jpg') }}" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="{{ asset('imgs/img-layouts/customer02.jpg') }}" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="{{ asset('imgs/img-layouts/customer01.jpg') }}" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="{{ asset('imgs/img-layouts/customer02.jpg') }}" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="{{ asset('imgs/img-layouts/customer01.jpg') }}" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="{{ asset('imgs/img-layouts/customer02.jpg') }}" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>
                    </table>
                </div> --}}
            </div>
        </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
