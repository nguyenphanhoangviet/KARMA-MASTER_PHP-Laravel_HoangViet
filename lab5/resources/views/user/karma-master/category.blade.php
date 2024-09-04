@extends('layouts.user')
@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shop Category Page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Fashon Category</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Browse Categories</div>
                    <ul class="main-categories">
                        @foreach ($categories as $category)
                            <li class="main-nav-list">
                                <a
                                    href="{{ route('category', array_merge(request()->all(), ['category' => $category->id])) }}">
                                    <span class="lnr lnr-arrow-right"></span>{{ $category->name }}
                                    <span class="number">({{ $category->products->count() }})</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar-filter mt-50">
                    <div class="top-filter-head">Product Filters</div>
                    <div class="common-filter">
                        <div class="head">Brands</div>
                        <form id="filterForm" action="{{ route('category') }}" method="GET">
                            <ul>
                                @foreach ($brands as $brand)
                                    <li class="filter-list">
                                        <input class="pixel-checkbox" type="checkbox" id="brand{{ $brand->id }}"
                                            name="brand" value="{{ $brand->id }}"
                                            {{ request('brand') == $brand->id ? 'checked' : '' }}
                                            onchange="this.form.submit()">
                                        <label for="brand{{ $brand->id }}">{{ $brand->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Color</div>
                        <form id="filterForm" action="{{ route('category') }}" method="GET">
                            <ul>
                                @foreach ($colors as $color)
                                    <li class="filter-list">
                                        <input class="pixel-checkbox" type="checkbox" id="color{{ $color->id }}"
                                            name="color" value="{{ $color->id }}"
                                            {{ request('color') == $color->id ? 'checked' : '' }}
                                            onchange="this.form.submit()">
                                        <label for="color{{ $color->id }}">{{ $color->name }}</label>
                                    </li>
                                @endforeach
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="pagination">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @if (isset($products) && $products->count() > 0)
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <a href="{{ route('single-product', $product->id) }}">
                                            <img class="img-fluid" src="{{ asset('imgs/products/' . $product->img) }}"
                                                alt="{{ $product->name }}">
                                        </a>
                                        <div class="product-details">
                                            <h6>{{ $product->name }}</h6>
                                            <div class="price">
                                                <h6>{{ number_format($product->price, 0) }} VNĐ</h6>
                                                @if ($product->original_price)
                                                    <h6 class="l-through">{{ number_format($product->original_price, 0) }}
                                                        VND
                                                    </h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @elseif(isset($category) && $category->products->count() > 0)
                            @foreach ($category->products as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-product">
                                        <img class="img-fluid" src="{{ asset('imgs/products/' . $product->img) }}"
                                            alt="{{ $product->name }}">
                                        <div class="product-details">
                                            <h6>{{ $product->name }}</h6>
                                            <div class="price">
                                                <h6>{{ number_format($product->price, 0) }} VNĐ</h6>
                                                @if ($product->original_price)
                                                    <h6 class="l-through">{{ number_format($product->original_price, 0) }}
                                                        VND
                                                    </h6>
                                                @endif
                                            </div>
                                            <div class="prd-bottom">
                                                <a href="" class="social-info">
                                                    <span class="ti-bag"></span>
                                                    <p class="hover-text">add to bag</p>
                                                </a>
                                                <a href="" class="social-info">
                                                    <span class="lnr lnr-heart"></span>
                                                    <p class="hover-text">Wishlist</p>
                                                </a>
                                                <a href="" class="social-info">
                                                    <span class="lnr lnr-sync"></span>
                                                    <p class="hover-text">compare</p>
                                                </a>
                                                <a href="{{ route('single-product', $product->id) }}" class="social-info">
                                                    <span class="lnr lnr-move"></span>
                                                    <p class="hover-text">view more</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No products found.</p>
                        @endif
                    </div>
                </section>
                <!-- End Best Seller -->
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="pagination">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                </div>
                <!-- End Filter Bar -->
            </div>
        </div>
    </div>

    <!-- Start related-product Area -->
    <section class="related-product-area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Deals of the Week</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @if ($allProducts->isEmpty())
                            <div class="col-lg-12">
                                <p>Chưa có sản phẩm nào.</p>
                            </div>
                        @else
                            @foreach ($allProducts as $product)
                                <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                    <div class="single-related-product d-flex">
                                        <a href="{{ route('single-product', $product->id) }}">
                                            <img src="{{ asset('imgs/products/' . $product->img) }}"
                                                alt="{{ $product->name }}" style="width:70px; height:70px">
                                        </a>
                                        <div class="desc">
                                            <a href="{{ route('single-product', $product->id) }}"
                                                class="title">{{ $product->name }}</a>
                                            <div class="price">
                                                <h6>{{ number_format($product->price, 0) }} VND</h6>
                                                @if ($product->original_price)
                                                    <h6 class="l-through">{{ number_format($product->original_price, 0) }}
                                                        VND
                                                    </h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('imgs/karma-master/r2.jpg') }}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('imgs/karma-master/r3.jpg') }}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('imgs/karma-master/r5.jpg') }}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('imgs/karma-master/r6.jpg') }}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('imgs/karma-master/r7.jpg') }}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('imgs/karma-master/r9.jpg') }}" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('imgs/karma-master/r10.jpg') }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="{{ asset('imgs/karma-master/r11.jpg') }}"
                                        alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">Black lace Heels</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="#" target="_blank">
                            <img class="img-fluid d-block mx-auto" src="{{ asset('imgs/karma-master/category/c5.jpg') }}"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End related-product Area -->

    <!-- Modal Quick Product View -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="container relative">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="product-quick-view">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="quick-view-carousel">
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="quick-view-content">
                                <div class="top">
                                    <h3 class="head">Mill Oil 1000W Heater, White</h3>
                                    <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span
                                            class="ml-10">$149.99</span></div>
                                    <div class="category">Category: <span>Household</span></div>
                                    <div class="available">Availibility: <span>In Stock</span></div>
                                </div>
                                <div class="middle">
                                    <p class="content">Mill Oil is an innovative oil filled radiator with the most modern
                                        technology. If you are
                                        looking for something that can make your interior look awesome, and at the same time
                                        give you the pleasant
                                        warm feeling during the winter.</p>
                                    <a href="#" class="view-full">View full Details <span
                                            class="lnr lnr-arrow-right"></span></a>
                                </div>
                                <div class="bottom">
                                    <div class="color-picker d-flex align-items-center">Color:
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                    </div>
                                    <div class="quantity-container d-flex align-items-center mt-15">
                                        Quantity:
                                        <input type="text" class="quantity-amount ml-15" value="1" />
                                        <div class="arrow-btn d-inline-flex flex-column">
                                            <button class="increase arrow" type="button" title="Increase Quantity"><span
                                                    class="lnr lnr-chevron-up"></span></button>
                                            <button class="decrease arrow" type="button" title="Decrease Quantity"><span
                                                    class="lnr lnr-chevron-down"></span></button>
                                        </div>

                                    </div>
                                    <div class="d-flex mt-20">
                                        <a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
                                        <a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
                                        <a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
