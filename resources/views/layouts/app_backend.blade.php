<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title> Backend - @yield('title') </title >

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-fixed/">

    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style>
        body {
            min-height: 75rem;
            padding-top: 4.5rem;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ route('get.home') }}">Backend UI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            @foreach(config('nav.admin.top') as $item)
            <li class="nav-item">
                <a class="nav-link {{ \Request::route()->getName() == $item['route'] ? 'active' : '' }}" href="{{ route($item['route']) }}">{{ $item['name'] }}</a>
            </li>
            @endforeach
        </ul>
{{--        <form class="form-inline mt-2 mt-md-0">--}}
{{--            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
{{--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--        </form>--}}
        <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="fab fa-user"></i> Hi {{ get_data_user('admins', 'name') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('get_admin.logout') }}" class="nav-link">
                    <i class="fab fa-user"></i> Thoát
                </a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container-fluid">
    @yield('content')
</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
    $(function() {
        $(document).ready(function() {
            $('#jsDataTable').DataTable();
        });

        $('body').on('click', '.btn-action-status', function(e) {
            e.preventDefault();
            let $this = $(this)
            let url = $this.attr('href');
            let status = $this.data('status');
            $.ajax({
                method: "post",
                url: url,
                data: {
                    "_token": "{{ csrf_token() }}",
                    status: status
                }
            }).done(function (result) {
                location.reload();
            });
        });
    });
</script>
</body>
</html>
