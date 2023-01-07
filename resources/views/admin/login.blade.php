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
    <link rel="shortcut icon" type="image/x-icon" href="/web2/assets/img/favicon.png">

    <title>DashForge Responsive Bootstrap 4 Dashboard Template</title>

    <!-- vendor css -->
    <link href="/web2/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/web2/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="/web2/assets/css/dashforge.css">
    <link rel="stylesheet" href="/web2/assets/css/dashforge.auth.css">
  </head>
  <body>

    <div class="content content-fixed content-auth">
      <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
          <div class="media-body align-items-center d-none d-lg-flex">
            <div class="mx-wd-600">
              <img src="https://via.placeholder.com/1260x950" class="img-fluid" alt="">
            </div>
            <div class="pos-absolute b-0 l-0 tx-12 tx-center">
              Workspace design vector is created by <a href="https://www.freepik.com/pikisuperstar" target="_blank">pikisuperstar (freepik.com)</a>
            </div>
          </div><!-- media-body -->
          <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
            <div class="wd-100p">
              <h3 class="tx-color-01 mg-b-5">Sign In</h3>
              <p class="tx-color-03 tx-16 mg-b-40">Hi Admin, welcome back! Please signin to continue.</p>

              <form action="{{ route('admin_login') }}" method="post">
                @csrf

                @if (session('msg'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Login Error!</strong> {{ session('msg') }}.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

              <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" class="form-control" value="{{ old("email") }}" placeholder="Email">
                @error("email")
                <small class="text-danger">{{ $message }}</small> 
                @enderror
              </div>
              <div class="form-group">
                <div class="d-flex justify-content-between mg-b-5">
                  <label class="mg-b-0-f">Password</label>
                  <a href="" class="tx-13">Forgot password?</a>
                </div>
                <input type="password" name="password" class="form-control" value="{{ old("password") }}" placeholder="Enter your password">
                @error("password")
                <small class="text-danger">{{ $message }}</small> 
                @enderror
              </div>
              <button type="submit" class="btn btn-brand-02 btn-block">Sign In</button>
            </form>
              <div class="divider-text">or</div>
              <button class="btn btn-outline-facebook btn-block">Switch to app login</button>
            </div>
          </div><!-- sign-wrapper -->
        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->

    <footer class="footer">
      <div>
        <span>&copy; 2019 DashForge v1.0.0. </span>
        <span>Created by <a href="http://themepixels.me">ThemePixels</a></span>
      </div>
      <div>
        <nav class="nav">
          <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
          <a href="../../change-log.html" class="nav-link">Change Log</a>
          <a href="https://discordapp.com/invite/RYqkVuw" class="nav-link">Get Help</a>
        </nav>
      </div>
    </footer>

    <script src="/web2/lib/jquery/jquery.min.js"></script>
    <script src="/web2/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/web2/lib/feather-icons/feather.min.js"></script>
    <script src="/web2/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="/web2/assets/js/dashforge.js"></script>

    <!-- append theme customizer -->
    <script src="/web2/lib/js-cookie/js.cookie.js"></script>
    <script src="/web2/assets/js/dashforge.settings.js"></script>
    <script>
      $(function(){
        'use script'

        window.darkMode = function(){
          $('.btn-white').addClass('btn-dark').removeClass('btn-white');
        }

        window.lightMode = function() {
          $('.btn-dark').addClass('btn-white').removeClass('btn-dark');
        }

        var hasMode = Cookies.get('df-mode');
        if(hasMode === 'dark') {
          darkMode();
        } else {
          lightMode();
        }
      })
    </script>
  </body>
</html>
