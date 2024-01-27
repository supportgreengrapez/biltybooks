@extends('layout.app')
@section('content')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="priceplan">
<div class="container">
        	<div class="row">
            
            	<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="plan">
                	<h2>Choose yours Bilty online plan.</h2>
                                    </div>
                </div>
                            </div>
            <div class="row">
            	<div class="col-lg-12 col-md-12 col-sm-12">
                	<div class="pricetable">
                    	<section class="pricing-table">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="item">
                        <div class="heading">
                            <h3>STARTER</h3>
                            <div class="row"> <label><input type="radio" name="colorRadio" value="red">USD</label>
                             <label><input type="radio" name="colorRadio" value="green">PKR</label>
                                 <div class="red box"><h3 style="color:#f9a848 !important;">$9/month</h3></div>
    <div class="green box price"><h3 style="color:#f9a848 !important;">PKR 2655/month</h3></div></div>
                           
                            <img src="img/1.png"  alt="img">
                             <a class="btn btn-block buybtn" href="{{url('/')}}/register">BUY NOW</a>
                        </div>
                        <div class="features">
                            <ul>
                            	<li><i class="fa fa-angle-down"></i> Add Records</li>
                                <li><i class="fa fa-angle-down"></i> Delete Records</li>
                                <li><i class="fa fa-angle-down"></i> Edit Records</li>
                                <li><i class="fa fa-angle-down"></i> View Records</li>
                                <li><i class="fa fa-angle-down"></i> User Managment</li>
                                <li><i class="fa fa-angle-down"></i> <b>3 Users</b></li>
                                <li><i class="fa fa-angle-down"></i> Reporting</li>
                                <li><i class="fa fa-angle-down"></i> PDF Downloads</li>
                                <li><i class="fa fa-angle-down"></i> Printing Recoards</li>
                                <li><i class="fa fa-angle-down"></i> 7 Days Trial</li>
                                <li><i class="fa fa-angle-down"></i> 8/7 Support</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="item">
                        <div class="heading">
                            <h3>ESSENTIALS</h3>
                            <div class="row"><label><input type="radio" name="colorRadio" value="black">USD</label>
                             <label><input type="radio" name="colorRadio" value="white">PKR</label>
                                 <div class="black box"><h3 style="color:#f9a848 !important;">$13/month</h3></div>
    <div class="white box price"><h3 style="color:#f9a848 !important;">PKR 3835/month</h3></div></div>
                            
                            
                            <img src="img/3.png"  alt="img">
                             <a class="btn btn-block buybtn" href="{{url('/')}}/register">BUY NOW</a>
                        </div>
                        <div class="features">
                            <ul>
                            <li><i class="fa fa-angle-down"></i> Add Records</li>
                                <li><i class="fa fa-angle-down"></i> Delete Records</li>
                                <li><i class="fa fa-angle-down"></i> Edit Records</li>
                                <li><i class="fa fa-angle-down"></i> View Records</li>
                                <li><i class="fa fa-angle-down"></i> User Managment</li>
                                <li><i class="fa fa-angle-down"></i> <b>7 Users</b></li>
                                <li><i class="fa fa-angle-down"></i> Reporting</li>
                                <li><i class="fa fa-angle-down"></i> PDF Downloads</li>
                                <li><i class="fa fa-angle-down"></i> Printing Recoards</li>
                                <li><i class="fa fa-angle-down"></i> 7 Days Trial</li>
                                <li><i class="fa fa-angle-down"></i> 8/7 Support</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="item">
                        <div class="heading">
                            <h3>PRO</h3>
                            <div class="row">
                                <label><input type="radio" name="colorRadio" value="pink">USD</label>
                             <label><input type="radio" name="colorRadio" value="yellow">PKR</label>
                                 <div class="pink box"><h3 style="color:#f9a848 !important;">$16/month</h3></div>
    <div class="yellow box price"><h3 style="color:#f9a848 !important;">PKR 4720/month</h3></div>
                            </div>
                            
                            
                            <img src="img/2.png"  alt="img">
                            <a class="btn btn-block buybtn" href="{{url('/')}}/register">BUY NOW</a>
                        </div>
                        <div class="features">
                            <ul>
                            	<li><i class="fa fa-angle-down"></i> Add Records</li>
                                <li><i class="fa fa-angle-down"></i> Delete Records</li>
                                <li><i class="fa fa-angle-down"></i> Edit Records</li>
                                <li><i class="fa fa-angle-down"></i> View Records</li>
                                <li><i class="fa fa-angle-down"></i> User Managment</li>
                                <li><i class="fa fa-angle-down"></i> <b>11 Users</b></li>
                                <li><i class="fa fa-angle-down"></i> Reporting</li>
                                <li><i class="fa fa-angle-down"></i> PDF Downloads</li>
                                <li><i class="fa fa-angle-down"></i> Printing Recoards</li>
                                <li><i class="fa fa-angle-down"></i> 7 Days Trial</li>
                                <li><i class="fa fa-angle-down"></i> 8/7 Support</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                    </div>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript">
$(".price").hide();
$(document).ready(function(){
    var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").hide();
        $(targetBox).show();
    });
});
</script>
@endsection