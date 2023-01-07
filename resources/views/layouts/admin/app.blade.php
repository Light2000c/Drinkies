<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/web2/assets//img/favicon.png">

    <title>DashForge Responsive Bootstrap 4 Dashboard Template</title>

    <!-- vendor css -->
    <link href="/web2/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/web2/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/web2/lib/jqvmap/jqvmap.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/web2/assets//css/dashforge.css">
    <link rel="stylesheet" href="/web2/assets//css/dashforge.dashboard.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  </head>
  <body>
    @include('sweetalert::alert')

    <aside class="aside aside-fixed">
      <div class="aside-header">
        <a href="../../index.html" class="aside-logo">dash<span>forge</span></a>
        <a href="" class="aside-menu-link">
          <i data-feather="menu"></i>
          <i data-feather="x"></i>
        </a>
      </div>
      <div class="aside-body">
        <div class="aside-loggedin">
          <div class="d-flex align-items-center justify-content-start">
            <a href="" class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></a>
            <div class="aside-alert-link">
              <a href="" data-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
            </div>
          </div>
          <div class="aside-loggedin-user">
            @if (Auth::user())
            <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
              <h6 class="tx-semibold mg-b-0">{{ $name }}</h6>
              <i data-feather="chevron-down"></i>
            </a>
            @endif
            <p class="tx-color-03 tx-12 mg-b-0">Administrator</p>
          </div>
          <div class="collapse" id="loggedinMenu">
            <ul class="nav nav-aside mg-b-0">
              <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li>
              <li class="nav-item"><a href="" class="nav-link"><i data-feather="user"></i> <span>View Profile</span></a></li>
            </ul>
          </div>
        </div><!-- aside-loggedin -->
        <ul class="nav nav-aside">
          <li class="nav-label">Menu</li>
          <li class="nav-item active"><a href="dashboard-one.html" class="nav-link"><i data-feather="shopping-bag"></i> <span>Dashboard</span></a></li>
          <li class="nav-item"><a href="dashboard-one.html" class="nav-link"><i data-feather="shopping-bag"></i> <span>Add Products</span></a></li>
          <li class="nav-item"><a href="dashboard-one.html" class="nav-link"><i data-feather="shopping-bag"></i> <span>Users</span></a></li>

          <li class="nav-label mg-t-25">Products</li>
          <li class="nav-item"><a href="app-calendar.html" class="nav-link"><i data-feather="calendar"></i> <span>Product</span></a></li>
          <li class="nav-item"><a href="app-chat.html" class="nav-link"><i data-feather="message-square"></i> <span>Carts</span></a></li>
          <li class="nav-item"><a href="app-contacts.html" class="nav-link"><i data-feather="users"></i> <span>Orders</span></a></li>
          <li class="nav-item"><a href="app-file-manager.html" class="nav-link"><i data-feather="file-text"></i> <span>Transactions</span></a></li>

          <li class="nav-label mg-t-25">Auth</li>
          <li class="nav-item"><a href="../../components" class="nav-link"><i data-feather="layers"></i> <span>Change Password</span></a></li>
          <li class="nav-item"><a href="../../collections" class="nav-link"><i data-feather="box"></i> <span>Logout</span></a></li>
        </ul>
      </div>
    </aside>
 




    @yield('content')


    <script src="/web2/lib/jquery/jquery.min.js"></script>
    <script src="/web2/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/web2/lib/feather-icons/feather.min.js"></script>
    <script src="/web2/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/web2/lib/jquery.flot/jquery.flot.js"></script>
    <script src="/web2/lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="/web2/lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="/web2/lib/chart.js/Chart.bundle.min.js"></script>
    <script src="/web2/lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="/web2/lib/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="/web2/assets//js/dashforge.js"></script>
    <script src="/web2/assets//js/dashforge.aside.js"></script>
    <script src="/web2/assets//js/dashforge.sampledata.js"></script>
    <script src="/web2/assets//js/dashboard-one.js"></script>

    <!-- append theme customizer -->
    <script src="/web2/lib/js-cookie/js.cookie.js"></script>
    <script src="/web2/assets//js/dashforge.settings.js"></script>
  </body>
</html>