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

<!-- Bootstrap CSS -->
<link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">

<!-- Fontawesome CSS -->
<link href="{{url('/')}}/css/font-awesome.min.css" rel="stylesheet">

<!-- Google Font -->
<!-- Main css -->
<link rel="stylesheet" href="{{url('/')}}/css/style.css">
<!-- Responsive css -->
<link rel="stylesheet" href="{{url('/')}}/css/responsive.css">
<link rel="stylesheet" href="{{url('/')}}/css/responsive.bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet">
<script  src="{{url('/')}}/js/jquery.min.js"></script>
<script  src="https://www.jqueryscript.net/demo/jQuery-Plugin-To-Convert-HTML-Table-To-CSV-tabletoCSV/jquery.tabletoCSV.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
</head>
<body>
<!-- menu -->
<header>
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-3 col-sm-12">
        <div class="logoimg"> <a href="{{url('/')}}/dashboard" class="navbar-brand"><img src="{{url('/')}}/img/logo.png" alt="logo" style="width:95px;"></a> </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 pull-right">
        <div id="google_translate_element" class="pull-right"></div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-default selfnav">
    <div class="container"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav custmul">
          <li><a href="{{url('/')}}/records-view"><i class="fa fa-copy"></i> Bilty Records</a></li>
          @if(session('type')=='client_owner')
          <li><a href="{{url('/')}}/manage-users"><i class="fa fa-users"></i> Manage User</a></li>
          @endif
          <li><a href="biltyrecords-report"><i class="fa fa-book"></i> Reports</a></li>
        </ul>
        <ul class="nav navbar-nav custmul navbar-right">
          <li><a href="{{url('/')}}/dashboard"><i class="fa fa-home"></i> Home</a></li>
          @if(session('type')=="client_owner")
          <li><a href="{{url('/')}}/view-subscription"><i class="fa fa-home"></i> Subscription</a></li>
          <li><a href="{{url('/')}}/view-transactions"><i class="fa fa-home"></i> Transactions</a></li>
          @endif
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{session('name')}} <span class="caret"></span></a>
            <ul class="dropdown-menu" style="background-color:#f9a848">
              @if(session('type')=="client_owner")
              <li><a href="{{url('/')}}/profile-edit">Edit Profile</a></li>
              <li role="separator" class="divider"></li>
              @endif
              <li><a href="{{url('/')}}/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container-fluid --> 
  </nav>
  <!-- /.navbar --> 
  
</header>
<div class="container">
  <div class="row">
    <div class="col-lg-12"> @if(session('subscription')=="NONE")
      <div class="alert alert-danger"> <strong>Note!</strong> Please Subscribe, so you can have full access of System. </div>
      @endif </div>
  </div>
</div>
@yield('content') 
<!--footer--> 
<script src="{{url('/')}}/js/bootstrap.min.js"></script> 
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> 
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>' 
<script src="{{url('/')}}/js/dataTables.responsive.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> 
      <script>
      $(document).ready(function() {
          $('#example').DataTable({
              
        responsive: true,
              "order": [[ 0, "desc" ]]
          });
      } );
      
      $(document).ready(function() {
    $('#example1').DataTable( {
        responsive: true,
retrieve: true,

"order": [[ 0, "desc" ]],
        dom: 'lBfrtip<"actions">',
    columnDefs: [],
    "iDisplayLength": 10,
    "aaSorting": [],
        buttons: [
            'csv', 'excel', 'print',
           {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ]
    } );
} );
      </script> 
<script>
function show1(){
document.getElementById('div2').style.display ='block';
document.getElementById('div1').style.display = 'none';
}
function show2(){
document.getElementById('div1').style.display = 'block';
document.getElementById('div2').style.display = 'none';
}
 </script> 
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script> 
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
</html>