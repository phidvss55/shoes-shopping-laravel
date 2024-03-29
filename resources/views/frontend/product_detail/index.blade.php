@extends('layouts.app_frontend')
@section('title', $product->pro_name)
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <!-- PRODUCT SLIDER-->
                <div class="row m-sm-0">
                    <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0">
                        <div class="owl-thumbs d-flex flex-row flex-sm-column" data-slider-id="1">
                            <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0 active">
                                <img class="w-100" src="{{ asset('img/product-detail-1.jpg') }}" alt="...">
                            </div>
                            <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0">
                                <img class="w-100" src="{{ asset('img/product-detail-2.jpg') }}" alt="...">
                            </div>
                            <div class="owl-thumb-item flex-fill mb-2 mr-2 mr-sm-0">
                                <img class="w-100" src="{{ asset('img/product-detail-3.jpg') }}" alt="...">
                            </div>
                            <div class="owl-thumb-item flex-fill mb-2">
                                <img class="w-100" src="{{ asset('img/product-detail-4.jpg') }}" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 order-1 order-sm-2">
                        <div class="owl-carousel product-slider owl-loaded owl-drag" data-slider-id="1">
                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1680px;">
                                    <div class="owl-item active" style="width: 420px;">
                                        <a class="d-block" href="{{ asset('img/product-detail-1.jpg') }}" data-lightbox="product" title="Product item 1">
                                            <img class="img-fluid" src="{{ asset('img/product-detail-1.jpg') }}" alt="...">
                                        </a>
                                    </div>
                                    <div class="owl-item" style="width: 420px;">
                                        <a class="d-block" href="{{ asset('img/product-detail-2.jpg') }}" data-lightbox="product" title="Product item 2">
                                            <img class="img-fluid" src="{{ asset('img/product-detail-2.jpg') }}" alt="...">
                                        </a>
                                    </div>
                                    <div class="owl-item" style="width: 420px;">
                                        <a class="d-block" href="{{ asset('img/product-detail-3.jpg') }}" data-lightbox="product" title="Product item 3">
                                            <img class="img-fluid" src="{{ asset('img/product-detail-3.jpg') }}" alt="...">
                                        </a>
                                    </div>
                                    <div class="owl-item" style="width: 420px;">
                                        <a class="d-block" href="{{ asset('img/product-detail-4.jpg') }}" data-lightbox="product" title="Product item 4">
                                            <img class="img-fluid" src="{{ asset('img/product-detail-4.jpg') }}" alt="...">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled">
                                <div class="owl-prev">prev</div>
                                <div class="owl-next">next</div>
                            </div>
                            <div class="owl-dots">
                                <div class="owl-dot active"><span></span></div>
                                <div class="owl-dot"><span></span></div>
                                <div class="owl-dot"><span></span></div>
                                <div class="owl-dot"><span></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
                @php
                    $age = 0;
                    if ($product->pro_review_total) {
                        $age = round(($product->pro_review_star / $product->pro_review_total), 0);
                    }
                @endphp
                <ul class="list-inline mb-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <li class="list-inline-item m-0">
                            <i class="fas {{ $i <= $age ? 'fa-star' : 'fa-star-half-alt' }} small text-warning"></i>
                        </li>
                    @endfor
                </ul>
                <h1>{{ $product->pro_name }}</h1>
                <p class="text-muted lead">{{ number_format($product->pro_price, 0, ',', '.') }} VND</p>
                <p class="text-small mb-4">{{ $product->pro_description }}</p>
                <div class="row align-items-stretch mb-4 box-qty">
                    <div class="col-sm-5 pr-sm-0">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
                            <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                            <div class="quantity">
                                <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                <input class="form-control border-0 shadow-0 p-0 val-qty" type="text" value="1">
                                <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pl-sm-0">
                        <a class="js-add-cart btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0"
                           href="{{ route('get_ajax.shopping.add', $product->id) }}">Add to cart</a>
                    </div>
                </div>
                <a class="btn btn-link text-dark p-0 mb-4" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a><br>
                <ul class="list-unstyled small d-inline-block">
{{--                    <li class="px-3 py-2 mb-1 bg-white">--}}
{{--                        <strong class="text-uppercase">SKU:</strong><span class="ml-2 text-muted">039</span>--}}
{{--                    </li>--}}
                    <li class="px-3 py-2 mb-1 bg-white text-muted">
                        <strong class="text-uppercase text-dark">{{ __('Danh mục: ') }}</strong>
                        <a class="reset-anchor ml-2" href="{{ route('get.category', [ 'slug' => $product->category->c_slug ?? '' ]) }}">{{ $product->category->c_name ?? "[N/A]"
                        }}</a>
                    </li>
                    @if($product->keywords && !$product->keywords->isEmpty())
                    <li class="px-3 py-2 mb-1 bg-white text-muted">
                        <strong class="text-uppercase text-dark">{{ __('Từ khoá: ') }}</strong>
                        @foreach ($product->keywords as $keyword)
                            <a class="reset-anchor ml-2" href="{{ route('get.keyword', ['slug' => $keyword->k_slug]) }}" title="{{ $keyword->k_name }}">{{ $keyword->k_name }}</a>
                        @endforeach
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- DETAILS TABS-->
        <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description"
                                    aria-selected="true">{{ __('Nội dung sản phẩm') }}</a></li>
            <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
            <li class="nav-item"><a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="reviews" aria-selected="false">Comments</a></li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <div class="p-4 p-lg-5 bg-white">
                    <h6 class="text-uppercase">Product description </h6>
                    <p class="text-muted text-small mb-0">{{ $product->pro_content }}</p>
                </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="p-4 p-lg-5 bg-white">
                    <div class="row">
                        <div class="col-lg-8">
                            @foreach ($votes as $vote)
                            <div class="media mb-3">
                                <img class="rounded-circle" src="http://res.cloudinary.com/demo/image/upload/sample.jpg" alt="" width="50">
                                <div class="media-body ml-3">
                                    <h6 class="mb-0 text-uppercase">{{ $vote->user->name ?? '[N\A]' }}</h6>
                                    <p class="small text-muted mb-0 text-uppercase">20 May 2020</p>
                                    <ul class="list-inline mb-1 text-xs">
                                        @for($i = 1; $i <= 5; $i++)
                                        <li class="list-inline-item m-0">
                                            <i class="fas fa-star {{ $i <= $vote->v_number ? '' : 'fa-star-half-alt' }} text-warning"></i>
                                        </li>
                                        @endfor
                                    </ul>
                                    <p class="text-small mb-0 text-muted">{{ $vote->v_content }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                <div class="p-4 p-lg-5 bg-white">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4>Comments list</h4>
                            <div class="post-comments">
                                @foreach($comments as $item)
                                    <div class="comment" style="margin-bottom: 20px">
                                        <div class="comment-header d-flex justify-content-between">
                                            <div class="user d-flex align-items-center">
                                                <div class="image">
                                                    <img style="width:60px; margin-bottom:5px" src="{{ pare_url_file($item->user->avatar ?? "") }}" alt="Image-avatar" class="img-fluid rounded-circle">
                                                </div>
                                                <div class="title">
                                                    <strong>{{ $item->c_name }}</strong>
                                                    <span class="date">{{ $item->created_at }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-body">
                                            <p>{{ $item->c_content }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if (get_data_user('web'))
                                <div class="add-comment">
                                    <header>
                                        <h3 class="h6">Leave a reply</h3>
                                    </header>
                                    <form action="{{ route('get.product_detail.comment', ['slug' => $product->pro_slug]) }}" class="commenting-form" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="c_name" value="{{ get_data_user('web', 'name') }}" placeholder="Name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="email" name="username" value="{{ get_data_user('web', 'email') }}" placeholder="Email Address (will not be published)" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea name="c_content" placeholder="Type your comment" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-secondary">Submit Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <p style="color: red">Please login for comment review this product.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- RELATED PRODUCTS-->
        <h2 class="h5 text-uppercase mb-4">{{ __('Sản phẩm liên quan') }}</h2>
        <div class="row">
            @foreach ($productRelated as $item)
                <div class="col-lg-3 col-sm-6">
                <div class="product text-center skel-loader">
                    <div class="d-block mb-3 position-relative">
                        <a class="d-block" href="{{ route('get.product_detail', ['slug' => $item->pro_slug]) }}">
                            <img class="img-fluid w-100" src="{{ pare_url_file($item->pro_avatar) }}" alt="{{ $item->pro_name }}">
                        </a>
                        <div class="product-overlay">
                            <ul class="mb-0 list-inline">
                                <li class="list-inline-item m-0 p-0">
                                    <a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a>
                                </li>
                                <li class="list-inline-item m-0 p-0">
                                    <a class="btn btn-sm btn-dark js-add-cart" href="#">Add to cart</a>
                                </li>
                                <li class="list-inline-item mr-0">
                                    <a class="btn btn-sm btn-outline-dark" href="{{ route('get_ajax.product_preview', $item->id) }}" data-toggle="modal"><i class="fas fa-expand"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h6><a class="reset-anchor" href="{{ route('get.product_detail', ['slug' => $item->pro_slug]) }}">{{ $item->pro_name }}</a></h6>
                    <p class="small text-muted">{{ number_format($item->pro_price, 0, ',', '.') }} VND</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop
