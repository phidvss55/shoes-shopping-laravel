@extends('layouts.app_frontend')
@section('title', 'Trang chủ')
@section('content')
    <div class="container">
        @if ($slide)
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center"
                 style="background: url({{ pare_url_file($slide->s_banner) }})">
            <div class="container py-5">
                <div class="row px-4 px-lg-5">
                    <div class="col-lg-6">
                        <p class="text-muted small text-uppercase mb-2">{{ $slide->s_description }}</p>
                        <h1 class="h2 text-uppercase mb-3">{{ $slide->s_title }}</h1>
                        <a class="btn btn-dark" href="{{ $slide->s_link }}">{{ $slide->s_text }}</a>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
            <header class="text-center">
                <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
                <h2 class="h5 text-uppercase mb-4">{{ __('Danh mục nổi bật')  }}</h2>
            </header>
            <div class="row">
                @if (isset($categoriesHot[0]) && $cate = $categoriesHot[0])
                <div class="col-md-4 mb-4 mb-md-0">
                    <a class="category-item" href="{{ route('get.category', ['slug' => $cate->c_slug]) }}">
                        <img class="img-fluid" src="{{ pare_url_file($cate->c_avatar) }}" alt="{{ $cate->c_name }}">
                        <strong class="category-item-title">Clothes</strong>
                    </a>
                </div>
                @endif
                <div class="col-md-4 mb-4 mb-md-0">
                    @if (isset($categoriesHot[1]) && $cate = $categoriesHot[1])
                    <a class="category-item mb-4" href="{{ route('get.category', ['slug' => $cate->c_slug]) }}">
                        <img class="img-fluid" src="{{ pare_url_file($cate->c_avatar) }}" alt="{{ $cate->c_name }}">
                        <strong class="category-item-title">Shoes</strong>
                    </a>
                    @endif
                    @if (isset($categoriesHot[2]) && $cate = $categoriesHot[2])
                    <a class="category-item mb-4" href="{{ route('get.category', ['slug' => $cate->c_slug]) }}">
                        <img class="img-fluid" src="{{ pare_url_file($cate->c_avatar) }}" alt="{{ $cate->c_name }}">
                        <strong class="category-item-title">Shoes</strong>
                    </a>
                    @endif
                </div>
                @if (isset($categoriesHot[3]) && $cate = $categoriesHot[3])
                <div class="col-md-4">
                    <a class="category-item" href="{{ route('get.category', ['slug' => $cate->c_slug]) }}">
                        <img class="img-fluid" src="{{ pare_url_file($cate->c_avatar) }}" alt="{{ $cate->c_name }}">
                        <strong class="category-item-title">{{ $cate->c_name }}</strong>
                    </a>
                </div>
                @endif
            </div>
        </section>
        <!-- TRENDING PRODUCTS-->
        <section class="py-5">
            <header>
                <h2 class="h5 text-uppercase mb-4">Top sản phẩm nổi bật</h2>
            </header>
            <div class="row">
                @if (isset($productsHot))
                    @foreach ($productsHot as $key => $item)
                        @if($key == 0)
                            <div class="col-xl-6 col-lg-4 col-sm-6">
                                <div class="product text-center">
                                    <a href="">
                                        <img src="https://cdn.tgdd.vn/Products/Images/42/220833/Feature/samsung-galaxy-s21-5g-ft-02.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="product text-center">
                                <div class="position-relative mb-3" >
                                    <div class="badge text-white badge-"></div>
                                    <a class="d-block" href="{{ route('get.product_detail', ['slug' => $item->pro_slug]) }}" title="{{ $item->pro_name }}">
                                        <img class="img-fluid w-100" src="{{ pare_url_file($item->pro_avatar) }}" alt="{{ $item->pro_name }}">
                                    </a>
                                    <div class="product-overlay">
                                        <ul class="mb-0 list-inline">
                                            <li class="list-inline-item m-0 p-0">
                                                <a class="btn btn-sm btn-outline-dark" href=""><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="list-inline-item m-0 p-0">
                                                <a class="btn btn-sm btn-dark js-add-cart" href="{{ route('get_ajax.shopping.add', $item->id) }}">Add to cart</a>
                                            </li>
                                            <li class="list-inline-item mr-0">
                                                <a class="btn btn-sm btn-outline-dark ajax-preview-product" href="{{ route('get_ajax.product_preview', $item->id) }}" data-toggle="modal">
                                                    <i class="fas fa-expand"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h6> <a class="reset-anchor" title="{{ $item->pro_name }}" href="{{ route('get.product_detail', ['slug' => $item->pro_slug]) }}">{{ $item->pro_name }}</a></h6>
                                <p class="small text-muted">{{ number_format($item->pro_price, 0, ',', '.') }} VNĐ</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <!-- NEWEST PRODUCTS -->
        @if (isset($productNews))
            @include('frontend.home.include._inc_product_hot', [ 'products' => $productNews ])
        @endif
        <!-- SERVICES-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="d-inline-block">
                            <div class="media align-items-end">
                                <svg class="svg-icon svg-icon-big svg-icon-light">
                                    <use xlink:href="#delivery-time-1"> </use>
                                </svg>
                                <div class="media-body text-left ml-3">
                                    <h6 class="text-uppercase mb-1">Free shipping</h6>
                                    <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="d-inline-block">
                            <div class="media align-items-end">
                                <svg class="svg-icon svg-icon-big svg-icon-light">
                                    <use xlink:href="#helpline-24h-1"> </use>
                                </svg>
                                <div class="media-body text-left ml-3">
                                    <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                                    <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-inline-block">
                            <div class="media align-items-end">
                                <svg class="svg-icon svg-icon-big svg-icon-light">
                                    <use xlink:href="#label-tag-1"> </use>
                                </svg>
                                <div class="media-body text-left ml-3">
                                    <h6 class="text-uppercase mb-1">Festival offer</h6>
                                    <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- NEWSLETTER-->
        <section class="py-5">
            <div class="container p-0">
                <div class="row">
                    <div class="col-lg-6 mb-3 mb-lg-0">
                        <h5 class="text-uppercase">Let's be friends!</h5>
                        <p class="text-small text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
                    </div>
                    <div class="col-lg-6">
                        <form action="#">
                            <div class="input-group flex-column flex-sm-row mb-3">
                                <input class="form-control form-control-lg py-3" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-dark btn-block" id="button-addon2" type="submit">Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
