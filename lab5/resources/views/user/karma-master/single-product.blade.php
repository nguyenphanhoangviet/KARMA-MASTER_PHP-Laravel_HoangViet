@extends('layouts.user')
@section('content')
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Product Details Page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">product-details</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{ asset('imgs/products/' . $product->img) }}"
                                alt="{{ $product->name }}">
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{ asset('imgs/products/' . $product->img) }}"
                                alt="{{ $product->name }}">
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{ asset('imgs/products/' . $product->img) }}"
                                alt="{{ $product->name }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $product->name }}</h3>
                        <h2>{{ number_format($product->price, 0) }} VND</h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Category</span> : {{ $product->category->name }}</a>
                            </li>
                            <li><a href="#"><span>Availibility</span> :
                                    {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}</a></li>
                        </ul>
                        <span>
                            Size:
                            <hr>
                            @foreach ($product->sizes as $size)
                                <button class="btn btn-size" onclick="setActive(this)">{{ $size->name }}</button>
                            @endforeach
                        </span>
                        <p>{{ $product->description }}</p>
                        <div class="card_area d-flex align-items-center">
                            <form action="{{ route('cart.add') }}" method="POST" onsubmit="return validateForm()">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1" id="product-quantity">
                                <input type="hidden" name="size" id="selected-size" value="">
                                <button type="submit" class="primary-btn">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                        aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                        aria-controls="review" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    @guest
                        <div class="row">
                            <div class="col-12 text-center">
                                <p class="text-danger">Bạn cần <a href="{{ route('login') }}">đăng nhập</a> hoặc <a
                                        href="{{ route('register') }}">đăng ký</a> để xem và đăng bình luận.</p>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="comment_list">
                                    @if ($comments->isEmpty())
                                        <p>Vui lòng bạn bình luận.</p>
                                    @else
                                        @foreach ($comments as $comment)
                                            <div class="review_item {{ $comment->parent_id ? 'reply' : '' }}">
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="{{ asset('imgs/karma-master/product/review-1.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4>{{ $comment->user->name }}</h4>
                                                        <h5>{{ $comment->created_at->format('d M, Y \a\t h:i a') }}</h5>
                                                        <p>{{ $comment->message }}</p>
                                                        <a class="reply_btn" href="#reply-form-{{ $comment->id }}"
                                                            onclick="document.getElementById('reply-form-{{ $comment->id }}').style.display='block';">Reply</a>
                                                    </div>
                                                </div>

                                                <!-- Hiển thị phản hồi -->
                                                @if ($comment->replies->count() > 0)
                                                    @foreach ($comment->replies as $reply)
                                                        <div class="review_item reply" style="margin-left: 50px;">
                                                            <div class="media">
                                                                <div class="d-flex">
                                                                    <img src="{{ asset('imgs/karma-master/product/review-2.png') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="media-body">
                                                                    <span style="color: rgb(126, 105, 105)">Đã phản hồi:
                                                                        {{ $comment->user->name }}</span>
                                                                    <h4>{{ $reply->user->name }}</h4>
                                                                    <h5>{{ $reply->created_at->format('d M, Y \a\t h:i a') }}
                                                                    </h5>
                                                                    <p>{{ $reply->message }}</p>
                                                                    <a class="reply_btn"
                                                                        href="#reply-form-{{ $comment->id }}"
                                                                        onclick="document.getElementById('reply-form-{{ $comment->id }}').style.display='block';">Reply</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                <!-- Form trả lời bình luận -->
                                                <form id="reply-form-{{ $comment->id }}"
                                                    style="display: none; margin-left: 50px;"
                                                    action="{{ route('store-reply', ['product_id' => $product->id, 'user_id' => auth()->id(), 'comment_id' => $comment->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" value="submit" class="btn primary-btn">Submit
                                                            Now</button>
                                                    </div>
                                                </form>

                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="review_box">
                                    <h4>Post a comment</h4>
                                    <form class="row contact_form"
                                        action="{{ route('store-comment', ['product_id' => $product->id, 'user_id' => auth()->id()]) }}"
                                        method="post" id="contactForm" novalidate="novalidate">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                    @guest
                        <div class="row">
                            <div class="col-12 text-center">
                                <p class="text-danger">Bạn cần <a href="{{ route('login') }}">đăng nhập</a> hoặc <a
                                        href="{{ route('register') }}">đăng ký</a> để xem và đăng đánh giá.</p>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row total_rate">
                                    <div class="col-6">
                                        <div class="box_total">
                                            <h5>Overall</h5>
                                            <h4>4.0</h4>
                                            <h6>(03 Reviews)</h6>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="rating_list">
                                            <h3>Based on 3 Reviews</h3>
                                            <ul class="list">
                                                <li><a href="#">5 Star <i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                                <li><a href="#">4 Star <i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                                <li><a href="#">3 Star <i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                                <li><a href="#">2 Star <i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                                <li><a href="#">1 Star <i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="review_list">
                                    @if ($product->reviews->isEmpty())
                                        <p>Vui lòng bạn đánh giá.</p>
                                    @else
                                        @foreach ($product->reviews as $review)
                                            <div class="review_item">
                                                <div class="media">
                                                    {{-- <div class="d-flex">
                                                <img src="{{ asset('imgs/user.png') }}" alt="user">
                                            </div> --}}
                                                    <div class="media-body">
                                                        <h4>{{ $review->user->name }}</h4>
                                                        @for ($i = 0; $i < $review->star; $i++)
                                                            <i class="fa fa-star"></i>
                                                        @endfor
                                                        @for ($i = 0; $i < 5 - $review->star; $i++)
                                                            <i class="fa fa-star" style="color: #ddd;"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <p>{{ $review->review }}</p>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="review_box">
                                    <h4>Add a Review</h4>
                                    <p>Your Rating:</p>
                                    <ul class="list">
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                    <p>Outstanding</p>
                                    <form class="row contact_form"
                                        action="{{ route('store-review', ['product_id' => $product->id, 'user_id' => auth()->id()]) }}"
                                        method="post" id="contactForm" novalidate="novalidate">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="star">Star:</label>
                                                <div class="star-rating">
                                                    <i class="fa-solid fa-star fa-2xl star" data-rating="1"
                                                        style="color: #ddd;"></i>
                                                    <i class="fa-solid fa-star fa-2xl star" data-rating="2"
                                                        style="color: #ddd;"></i>
                                                    <i class="fa-solid fa-star fa-2xl star" data-rating="3"
                                                        style="color: #ddd;"></i>
                                                    <i class="fa-solid fa-star fa-2xl star" data-rating="4"
                                                        style="color: #ddd;"></i>
                                                    <i class="fa-solid fa-star fa-2xl star" data-rating="5"
                                                        style="color: #ddd;"></i>
                                                </div>
                                                <input type="hidden" name="star" id="star"
                                                    value="{{ old('star', 0) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    placeholder="Phone Number" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Phone Number'">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="review" id="review" rows="1" placeholder="Review"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Review'"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->

    <!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom">
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

    <!-- start footer Area -->
@endsection
