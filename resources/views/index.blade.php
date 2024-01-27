@extends('layout.app')
@section('content')
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/bilty-banner-1.png" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="img/bilty-banner-2.png" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="img/BiltyBanner-3.png" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<div class="container">
    
<div class="row">
<div class="col-lg-12">
<div class="content_heading">
        <h2><strong>Add Records</strong></h2>
        </div>
</div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="discription">
        <p>Add your Bilty Records with ease. Whether it is an import from abroad or a shipment/delivery to your customer, track all of your bilty activities from one platform.</p>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="content_img"> <img src="{{url('/')}}/img/content (2).png"  alt="tableimg"> </div>
    </div>
  </div>
<div class="row">
<div class="col-lg-12">
<div class="content_heading">
        <h2><strong>Save Records</strong></h2>
        </div>
</div>
</div>
<div class="banner">
    	<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="discription">
        <p>Save your records with relative ease and flexibility. Never worry about data loss, with backups on our server your previous/old data is never lost. That’s the magic of managing your bilty acitvities on the Cloud. </p>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="content_img"> <img src="{{url('/')}}/img/content3.png"  alt="tableimg"> </div>
    </div>
  </div>

    </div>
    <div class="row">
<div class="col-lg-12">
<div class="content_heading">
        <h2><strong>Best Platform for Online Business</strong></h2>
        </div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12">
      <div class="content_img"> <img src="{{url('/')}}/img/content.png"  alt="tableimg"> </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="discription">
        <p>Best platform to conduct massive bilty activities. This software can track multiple activities from multiple companies at the same time. Also you can manage the permissions for your team, and give limited access to people at the lower end of the spectrum while the higher end people get to manage everything with their logins.</p>
      </div>
    </div>
    
  </div>
</div>

@endsection