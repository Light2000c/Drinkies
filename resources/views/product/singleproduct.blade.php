@extends('layouts.user.app')

@section('content')

<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <a href="shop-grid-right.html">Shop</a> <span></span> {{ $product->product_name }}
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50 mt-30">
                            <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider">
                                        <figure class="border-radius-10">
                                            <img src="/products/{{ $product->product_image }}" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="/web1/assets/imgs/shop/product-16-1.jpg" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="/web1/assets/imgs/shop/product-16-3.jpg" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="/web1/assets/imgs/shop/product-16-4.jpg" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="/web1/assets/imgs/shop/product-16-5.jpg" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="/web1/assets/imgs/shop/product-16-6.jpg" alt="product image" />
                                        </figure>
                                        <figure class="border-radius-10">
                                            <img src="/web1/assets/imgs/shop/product-16-7.jpg" alt="product image" />
                                        </figure>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails">
                                        <div><img src="/web1/assets/imgs/shop/thumbnail-3.jpg" alt="product image" /></div>
                                        <div><img src="/web1/assets/imgs/shop/thumbnail-4.jpg" alt="product image" /></div>
                                        <div><img src="/web1/assets/imgs/shop/thumbnail-5.jpg" alt="product image" /></div>
                                        <div><img src="/web1/assets/imgs/shop/thumbnail-6.jpg" alt="product image" /></div>
                                        <div><img src="/web1/assets/imgs/shop/thumbnail-7.jpg" alt="product image" /></div>
                                        <div><img src="/web1/assets/imgs/shop/thumbnail-8.jpg" alt="product image" /></div>
                                        <div><img src="/web1/assets/imgs/shop/thumbnail-9.jpg" alt="product image" /></div>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-info pr-30 pl-30">
                                    <span class="stock-status out-stock"> Sale Off </span>
                                    <h2 class="title-detail">{{ $product->product_name }}</h2>
                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <span class="current-price text-brand">₦{{ number_format($product->product_price,2) }}</span>
                                            <span>
                                                <span class="old-price font-md ml-15">$52</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="short-desc mb-30">
                                        <p class="font-lg">{{ $product->product_description }}</p>
                                    </div>
                                    <div class="detail-extralink mb-50">
                                        <div class="detail-qty border radius">
                                            <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                            <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>
                                        @if (Auth::user())
                                        <div class="product-extra-link2">
                                            @if(!$product->hascart(Auth::user()))
                                            <form action="{{ route('add_to_cart', $product) }}" method="post">
                                                @csrf
                                            <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                        </form>
                                        @else
                                        <form action="{{ route('remove_from_cart', $product) }}" method="post">
                                            @csrf
                                            @method('delete')
                                        <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Remove from cart</button>
                                    </form>
                                        @endif
                                        </div>
                                        @else
                                        <div class="product-extra-link2">
                                            <form action="{{ route('add_to_cart', $product) }}" method="post">
                                                @csrf
                                            <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                        </form>
                                        </div>
                                        @endif
                                        <div class="product-extra-link2">
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        </div>
                                    </div>
                                    <div class="font-xs">
                                        <ul class="mr-50 float-start">
                                            <li class="mb-5">Type: <span class="text-brand">Organic</span></li>
                                            <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                            <li>LIFE: <span class="text-brand">70 days</span></li>
                                        </ul>
                         
                                    </div>
                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Additional_info">Additional Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Delivery">Delivery</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">

                                    <div class="tab-pane fade show active" id="Additional_info">
                              <div>
                                 <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente ipsam non rem asperiores optio unde, odio ab sit at atque incidunt vero tenetur quasi minima! Vel nulla omnis tempore saepe.</p>
                              </div>
                                    </div>

                                    <div class="tab-pane fade" id="Delivery">
                                        <div>
                                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum veniam quas expedita quisquam natus dolorem exercitationem tempora modi perferendis incidunt nesciunt earum quod possimus a ex, assumenda, nam fugiat? Facilis?</p>
                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h2 class="section-title style-1 mb-30">Related products</h2>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    @foreach($related as $relate)
                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img" src="/products/{{ $relate->product_image }}" alt="" />
                                                        <img class="hover-img" src="/products/{{ $relate->product_image }}" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot">Hot</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="shop-product-right.html" tabindex="0">{{ $relate->product_name }}</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>₦{{ number_format($relate->product_price,2) }}</span>
                                                    <span class="old-price">$245.8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    {{-- <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html" tabindex="0">
                                                        <img class="default-img" src="/web1/assets/imgs/shop/product-3-1.jpg" alt="" />
                                                        <img class="hover-img" src="/web1/assets/imgs/shop/product-4-2.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                                    <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                                    <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                                                </div>
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="sale">-12%</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a href="shop-product-right.html" tabindex="0">Smart Bluetooth Speaker</a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span> </span>
                                                </div>
                                                <div class="product-price">
                                                    <span>$138.85 </span>
                                                    <span class="old-price">$145.8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
