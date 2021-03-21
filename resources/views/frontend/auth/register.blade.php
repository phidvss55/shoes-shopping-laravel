<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Đăng ký') }}</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('img/favicon.png') }}">
    <style>
        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('https://res.cloudinary.com/mhmd/image/upload/v1555917661/art-colorful-contemporary-2047905_dxtao7.jpg');
            background-size: cover;
            background-position: center center;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-md-6 d-none d-md-flex bg-image"></div>
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-4">{{ __('Đăng ký thành viên.') }}</h3>
                            <p class="text-muted mb-4">{{ __('Vui lòng điền đầy đủ thông tin đăng ký.') }}</p>
                            <form method="post" action="">
                                @csrf
                                <div class="form-group mb-3">
                                    <input id="inputEmail" type="email" name="email" placeholder="Email address" required autofocus
                                           class="form-control rounded-pill border-0 shadow-sm px-4">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password" placeholder="Password" required
                                           class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="name" placeholder="Name" required
                                           class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="phone" placeholder="Phone" required
                                           class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">{{ __('Đăng ký') }}</button>
                                <div class="text-center d-flex justify-content-between mt-4">
                                    <p>{{ __('Bạn đã có tài khoản? ') }}
                                        <a href="{{ route('get.login') }}" class="font-italic text-muted">
                                            <u>{{ __('Đăng nhập') }}</u>
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
