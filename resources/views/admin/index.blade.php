<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="create user" name="CURD">
    <title>Wellcome to website</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="{{url('css/app.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <script src="{{url('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{url('css/jquery-confirm.css')}}">
</head>
<body>
    @include("admin/layout/header")
    <section class="container-fluid hapo-wrap-content">
        <div class="row">
            <div class="col-md-2 col-12 hapo-content-left">
                <div class="hapo-nav">
                    <h2 class="hapo-nav-header d-flex align-items-center justify-content-center">Menu</h2>
                    <ul class="navbar-nav align-items-center hapo-nav-item">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('admin/users')}}">List User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.create') }}">Add User</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-12 hapo-content-right ">
                @yield('content')
            </div>
        </div>
    </section>
    @include("admin/layout/footer")
    <script src="{{url('js/app.js')}}"></script>
</body>
</html>
