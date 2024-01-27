@extends('client.layout.app')
@section('content')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="priceplan">
<div class="container">
        	<div class="row">
                    @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                    @endif
                    @if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
            	<div class="col-lg-12 col-md-12 col-sm-12">
                <div class="plan">
                	<h2 style"text-aline:center;"><b>Choose Yours Bilty online plan.</b></h2>
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
    <div class="green box price"><h3 style="color:#f9a848 !important;">PKR 1452/month</h3></div></div>
                        <img src="{{url('/')}}/img/1.png"  alt="img">
                        @if(session('subscription')=='BASIC' && $mop !="cash")
                        <button  class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                        <a href="{{url('/')}}/cancel-agreement/{{$a_id}}">cancel subscription</a>
                        @elseif($check!=1)
                        @if($mop == "cash" && session('subscription')=='BASIC')
                        <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                            @else
                        <a href="{{url('/')}}/paypal/create-plan/BASIC" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a>
                        <div class="or-seperator"><i>or</i></div>
                        <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModal">SUBSCRIBE WITH CASH SLIP</button>
                          <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
    <form action="{{url('/')}}/upload-cash-slip/BASIC" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          
              <input type="file" name="fileupload"  id="fileupload" required>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Done</button>
        </div>
      </div>
      </form>
      
    </div>
  </div>
  @endif
  @else
  <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                        @endif
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
                                <li><i class="fa fa-angle-down"></i> 24/7 Support</li>
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
    <div class="white box price"><h3 style="color:#f9a848 !important;">PKR 2096/month</h3></div></div>
                            <img src="{{url('/')}}/img/3.png"  alt="img">
                            @if(session('subscription')=='ESSENTIAL' && $mop !="cash")
                            <button class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                            <a href="{{url('/')}}/cancel-agreement/{{$a_id}}">cancel subscription</a>
                            @elseif($check!=1)
                            @if($mop == "cash" && session('subscription')=='ESSENTIAL')
                            <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                            @else
                            <a href="{{url('/')}}/paypal/create-plan/ESSENTIAL" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a>
                            <div class="or-seperator"><i>or</i></div>
                            <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModal2">SUBSCRIBE WITH CASH SLIP</button>
                                           <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form action="{{url('/')}}/upload-cash-slip/ESSENTIAL" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          
              <input type="file" name="fileupload"  id="fileupload">
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" >Done</button>
        </div>
      </div>
      </form>
      
    </div>
  </div>
  @endif
  @else
  <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                            @endif
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
                                <li><i class="fa fa-angle-down"></i> 24/7 Support</li>
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
    <div class="yellow box price"><h3 style="color:#f9a848 !important;">PKR 2580/month</h3></div>
                            </div>
                            <img src="{{url('/')}}/img/2.png"  alt="img">
                            @if(session('subscription')=='PRO' && $mop !="cash")
                        <button class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                        <a href="{{url('/')}}/cancel-agreement/{{$a_id}}">cancel subscription</a>
                        @elseif($check!=1)
                        
                        @if($mop == "cash" && session('subscription')=='PRO')
                        <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                        @else
                        <a href="{{url('/')}}/paypal/create-plan/PRO" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a>
                        <div class="or-seperator"><i>or</i></div>
                        <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModal3">SUBSCRIBE WITH CASH SLIP</button>
                                       <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form action="{{url('/')}}/upload-cash-slip/PRO" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          
              <input type="file" name="fileupload"  id="fileupload">
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" >Done</button>
        </div>
      </div>
      </form>
      
    </div>
   
  </div>
  @endif
  @else
  <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                        @endif
                        
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
                                <li><i class="fa fa-angle-down"></i> 24/7 Support</li>
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