<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Lightbox-->
    <link rel="stylesheet" href="{{ asset('vendor/lightbox2/css/lightbox.min.css') }}">
    <!-- Range slider-->
    <link rel="stylesheet" href="{{ asset('vendor/nouislider/nouislider.min.css') }}">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel2/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel2/assets/owl.theme.default.css') }}">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>
<div class="page-holder">
    <!-- navbar-->
    <header class="header bg-white">
        <div class="container px-0 px-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0">
                <a class="navbar-brand" href="{{ route('get.home') }}" title="Boutique">
                    <span class="font-weight-bold text-uppercase text-dark">Boutique</span>
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('get.home') }}" title="Dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true"
                                                         aria-expanded="false">Danh mục sản phẩm</a>
                            <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown">
                                @foreach ($categoriesGlobal as $item)
                                    <a class="dropdown-item border-0 transition-link" title="{{ $item->c_name }}" href="{{ route('get.category', $item->c_slug) }}">
                                        {{ $item->c_name }}
                                    </a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.blog') }}" title="Article">Articles</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.shopping') }}" title="Carts">
                                <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart <small class="text-gray">({{ \Cart::count() }})</small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a>
                        </li>
                        @if (get_data_user('web'))
                            <li class="nav-item">
                                <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-user-alt mr-1 text-black"></i> {{ get_data_user
                                ('web', 'name') }}</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">{{ __('Đơn hàng') }}</a>
                                    <a href="{{ route('get.logout') }}" class="dropdown-item">{{ __('Đăng xuất') }}</a>
                                </div>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('get.login') }}"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--  Modal -->
    <div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true"></div>
    <!-- HERO SECTION-->
    @yield('content')

    <footer class="bg-dark text-white">
        <div class="container py-4">
            <div class="row py-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase mb-3">Customer services</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#">Help &amp; Contact Us</a></li>
                        <li><a class="footer-link" href="#">Returns &amp; Refunds</a></li>
                        <li><a class="footer-link" href="#">Online Stores</a></li>
                        <li><a class="footer-link" href="#">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="text-uppercase mb-3">Company</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#">What We Do</a></li>
                        <li><a class="footer-link" href="#">Available Services</a></li>
                        <li><a class="footer-link" href="#">Latest Posts</a></li>
                        <li><a class="footer-link" href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="text-uppercase mb-3">Social media</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a class="footer-link" href="#">Twitter</a></li>
                        <li><a class="footer-link" href="#">Instagram</a></li>
                        <li><a class="footer-link" href="#">Tumblr</a></li>
                        <li><a class="footer-link" href="#">Pinterest</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-top pt-4" style="border-color: #1d1d1d !important">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="small text-muted mb-0">&copy; 2020 All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 text-lg-right">
{{--                        <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstraptemple.com/p/bootstrap-ecommerce">Bootstrap Temple</a></p>--}}
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- JavaScript files-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/lightbox2/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/owl.carousel2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
    <script>
        function injectSvgSprite(path) {
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
                var div = document.createElement("div");
                div.className = 'd-none';
                div.innerHTML = ajax.responseText;
                document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }

        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
    </script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.ajax-preview-product').click(function(e) {
                e.preventDefault();
                let $this = $(this)
                let URL = $this.attr('href');
                $.ajax({
                    method: "post",
                    url: URL,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    }
                }).done(function (result) {
                    if (result.status === 200) {
                        $('#productView').html(result.html).modal({
                            show: true
                        });
                    }
                });
            });

            $('body').on('click', '.js-add-cart', function(e) {
                e.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                let qty = 1;
                let $elementQty = $this.parents('.box-qty').find('.val-qty');
                if ($elementQty.length) {
                    qty = $elementQty.val();
                }
                $.ajax({
                    method: "post",
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        qty: qty
                    }
                }).done(function (result) {
                    console.log(result)
                });
            });

            $('body').on('click', '.js-delete-cart', function(e) {
                e.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $.ajax({
                    method: "post",
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    }
                }).done(function (result) {
                    console.log(result)
                    if (result.status === 200) {
                        $this.parents('tr').remove()
                    }
                });
            });

            $('body').on('click', '.js-update-cart', function(e) {
                e.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                let $elementQty = $this.parents('tr').find('.val-qty');
                let qty = $elementQty ? $elementQty.val() : 1;

                $.ajax({
                    method: "post",
                    url: url,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'qty': qty
                    }
                }).done(function (result) {

                    console.log(result);
                });
            });
        });
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" >
</div>
</body>
</html>
