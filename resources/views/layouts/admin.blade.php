<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flowers Shop admin panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href=https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('../../plugins/select2/css/select2.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = false;
        const pusher = new Pusher('caa2a65ec56d8987e905', {
            cluster: 'eu',
            channelAuthorization: { endpoint: "/broadcasting/auth"}
        });
        const channel = pusher.subscribe('private-store_order');
        channel.bind('store_order', (data) => {
            const order = data.data;
            console.log(order);
            const count_notify = document.getElementById("count_notify")
            count_notify.innerText = parseInt(count_notify.innerText) + 1;
            document.getElementById("notification-container").insertAdjacentHTML("afterend",
                `<a href="{{ route('order.index') }}" class="dropdown-item">
                    <p style="vertical-align: inherit;">${order.user.name + " " + order.user.surname + " сделал новый заказ на " + order.total_price + " рублей!"}</p>
                    <span class="float-right text-muted text-sm">${String(new Date().getDate()).padStart(2, '0') + '.' + String(new Date().getMonth() + 1).padStart(2, '0') + '.' + (new Date()).getFullYear()}</span>
                </a>
                <div class="dropdown-divider"></div>`);

            alert(order.user.name + " " + order.user.surname + " сделал новый заказ на " + order.total_price + " рублей!");
        });
    </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge" id="count_notify">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div id="notification-container">
                    </div>
                    <a href="{{ route('order.index') }}" class="dropdown-item dropdown-footer">Перейти к заказам</a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('admin.index')}}" class="brand-link">
            <span class="brand-text font-weight-light">Магазин цветов</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->




            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('order.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-shopping-bag"></i>
                            <p>
                                Заказы
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('flower.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-tree"></i>
                            <p>
                                Цветы
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                Категории
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('tag.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-tags"></i>
                            <p>
                                Теги
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Пользователи
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @yield('content')

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://localhost:8000">Flowers shop</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->


<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- Select2 -->
<script src="{{asset("../../plugins/select2/js/select2.full.min.js")}}"></script>
<script>$('.tags').select2()</script>
</body>
</html>
