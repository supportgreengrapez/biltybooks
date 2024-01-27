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
<link rel="shortcut icon" href="images/favicon.png"/>
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

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
 
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            @if(session()->has('loginerror'))
            <div class="alert alert-danger">{{ session()->get('loginerror') }}</div>
            @endif
            <form method="post" action="{{url('/')}}/admin-login">
              {{csrf_field()}}
              <h1>Login Form</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-success submit" type="submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                <h1><i><img src="{{url('/')}}/admin1/images/logo.png" alt="logo" style="max-width:250px;"></i></h1>
                  <p>Copyright © 2020-2021 Builty Books. All rights reserved.</p>
                  <p>powered By <a href="https://greengrapez.com/" target="_blank"><img src="{{url('/')}}/img/logo1.png" alt="logo" style="max-width:70px;"></a></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
