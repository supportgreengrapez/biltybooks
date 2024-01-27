<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="description" content="BiltyBooks is a Bilty Record Keeping Cloud Software which aims to help its users maintain their outgoing and incoming shipments with different customers and suppliers. You can Add, manage, download and delete your bilty records instantly. All the data that you enter on the platform is 100% secure and you do not need to worry about any data theft or data sharing with any 3rd party." />
<meta name="keywords" content="Record Keeping ,Cloud Software,Bilty Software" />
<meta name="author" content="Bilty Books">
<link rel="shortcut icon" href="{{url('/')}}/img/favicon.png"/>
<title>BiltyBooks.com | Manage your Builty Records - Record Keeping</title>
<link rel="shortcut icon" href="{{url('/')}}/admin1/images/favicon.png"/>

<!-- Bootstrap -->
<link href="{{url('/')}}/admin1/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{url('/')}}/admin1/css/font-awesome.min.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="{{url('/')}}/admin1/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- iCheck -->
<link href="{{url('/')}}/admin1/css/green.css" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="{{url('/')}}/admin1/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title"> <a href="{{url('/')}}/admin-dashboard" class="site_title"><i><img src="{{url('/')}}/admin1/images/er.png" alt="logo"></i> <span><b>Bilty Books</b></span></a> </div>
        <div class="clearfix"></div>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <ul class="nav side-menu">
              <li><a href="{{url('/')}}/admin-dashboard"><i class="fa fa-home"></i> Home </a>
                
              </li>
              <li><a><i class="fa fa-edit"></i>Transaction<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{url('/')}}/admin-paypal-transaction-complete">Paypal Transaction</a></li>
                  <li><a href="{{url('/')}}/admin-cash-transaction-complete">Cash Transaction</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-edit"></i>Pending Transactions<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{url('/')}}/admin-cash-pending-transactions">pending</a></li>
                  <li><a href="{{url('/')}}/admin-cash-declined-transactions">declined</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-users"></i>User<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{url('/')}}/admin-view-users">View User</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <!-- /sidebar menu --> 
      </div>
    </div>
    
    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
          
          <ul class="nav navbar-nav navbar-right">
            <li class=""> <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="images/favicon.png" alt="">Bilty Books <span class=" fa fa-angle-down"></span> </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="{{url('/')}}/admin-logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation --> 
    @yield('content')

      <!-- footer content -->
      <footer>
        <div class="pull-right"> Copyright © 2020-2021 Builty Books. All rights reserved.<br>
        Powered By : <a href="https://greengrapez.com/" target="_blank"><img src="{{url('/')}}/img/logo1.png" alt="logo" style="max-width:70px;"></a></div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content --> 
    </div>
  </div>
  
  <!-- jQuery --> 
  <script src="{{url('/')}}/admin1/js/jquery.min.js"></script> 
  <!-- Bootstrap --> 
  <script src="{{url('/')}}/admin1/js/bootstrap.min.js"></script> 
  <!-- DateJS --> 
  <script src="{{url('/')}}/admin1/js/build/date.js"></script> 
  <!-- bootstrap-progressbar --> 
  <script src="{{url('/')}}/admin1/js/bootstrap-progressbar.min.js"></script> 
  <!-- iCheck --> 
  <script src="{{url('/')}}/admin1/js/icheck.min.js"></script> 
  <!-- bootstrap-daterangepicker --> 
  <script src="{{url('/')}}/admin1/js/moment.min.js"></script> 
  <script src="js/daterangepicker.js"></script> 
  <!-- Custom Theme Scripts --> 
  <script src="{{url('/')}}/admin1/js/custom.min.js"></script>
  <!-- Datatables --> 
<script src="{{url('/')}}/admin1/js/jquery.dataTables.min.js"></script> 
<script src="{{url('/')}}/admin1/js/dataTables.bootstrap.min.js"></script> 
<script src="{{url('/')}}/admin1/js/dataTables.responsive.min.js"></script> 
<script src="{{url('/')}}/admin1/js/responsive.bootstrap.js"></script> 
<script src="{{url('/')}}/admin1/js/dataTables.scroller.min.js"></script>
  </body>
  </html>
  