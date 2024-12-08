
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Water Go</title>
    <link rel="stylesheet" href="../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../assets/vendors/chartist/chartist.min.css">
    <link rel="stylesheet" href="../assets/css/vertical-light-layout/style.css">
    <link rel="shortcut icon" href="../assets/images/logo1.png" />
  </head>
  <body>
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="background-color: #fff;">
          <a class="navbar-brand brand-logo" href="{{ route('home') }}" style="font-weight: 700;">
            Water<span style="color: #1BDBE0;">Go</span>
          </a>
          <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}"><img src="../assets/images/logo1.png" alt="logo" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link" id="UserDropdown" href="profel.html">
                <img class="img-xs rounded-circle ms-2" src="../assets/images/faces/face8.jpg" alt="Profile image"> <span class="font-weight-normal"> Henry Klein </span>
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <br>
            @guest
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">
                <span class="menu-title">Bosh sahifa</span>
                <i class="icon-screen-desktop menu-icon" style="color: #1BDBE0;"></i>
              </a>
            </li>
            @if(Auth::user()->role=='drektor' OR Auth::user()->role=='despetcher')
            <li class="nav-item">
              <a class="nav-link" href="customer.html">
                <span class="menu-title">Buyurtmalar</span>
                <i class="fa fa-address-card menu-icon" style="color: #1BDBE0;"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="customer_end.html">
                <span class="menu-title">Buyurtmalar tarixi</span>
                <i class="fa fa-cubes menu-icon" style="color: #1BDBE0;"></i>
              </a>
            </li>
              @if(Auth::user()->role=='drektor')
              <li class="nav-item">
                <a class="nav-link" href="chart01.html">
                  <span class="menu-title">Statistika</span>
                  <i class="fa fa-bar-chart-o menu-icon" style="color: #1BDBE0;"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('emploes') }}">
                  <span class="menu-title">Hodimlar</span>
                  <i class="fa fa-users menu-icon" style="color: #1BDBE0;"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="settings.html">
                  <span class="menu-title">Sozlamalar</span>
                  <i class="fa fa-gears menu-icon" style="color: #1BDBE0;"></i>
                </a>
              </li>
              @endif
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('company') }}">
                <span class="menu-title">Kompaniya</span>
                <i class="fa fa-institution menu-icon" style="color: #1BDBE0;"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="chart02.html">
                <span class="menu-title">Statistika</span>
                <i class="fa fa-bar-chart-o menu-icon" style="color: #1BDBE0;"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.html">
                <span class="menu-title">Admin</span>
                <i class="fa fa-users menu-icon" style="color: #1BDBE0;"></i>
              </a> 
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="menu-title">Chiqish</span>
                <i class="fa fa-sign-out menu-icon" style="color: #1BDBE0;"></i>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </li>
            @endguest
          </ul>
        </nav>
        
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
        </div>
      </div>
    </div>

    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assets/vendors/moment/moment.min.js"></script>
    <script src="../assets/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="../assets/vendors/chartist/chartist.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../assets/js/jquery.cookie.js"></script>
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5@1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#customerTable').DataTable();
      });
      $(".phone").inputmask("+999 99 999 9999");
    </script>
  </body>
</html>