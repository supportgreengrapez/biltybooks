@extends('client.layout.app')
@section('content')

<style>
    a:hover,a:focus{
    outline: none;
    text-decoration: none;
}
.tab .nav-tabs{ border: none; }
.tab .nav-tabs li a{
    padding: 12px 15px;
    margin-right: 10px;
    font-size: 17px;
    font-weight: 800;
    color: #9b9b9c;
    text-transform: uppercase;
    border: 2px solid #e5e7e9;
    border-radius: 0;
    overflow: hidden;
    z-index: 1;
    position: relative;
}
.tab .nav-tabs li a:hover,
.tab .nav-tabs li a:focus,
.tab .nav-tabs li.active a{
    background: transparent;
    border: 2px solid #3a506b;
    color: #fff;
}
.tab .nav-tabs li a:before{
    content: "";
    width: 500%;
    height: 0;
    background: #ff9f1c;
    position: absolute;
    top: 50%;
    left: 50%;
    opacity: 0;
    z-index: -1;
    transform: translateX(-50%) translateY(-50%) rotate(45deg);
    transition: all 0.3s ease-in-out 0s;
}
.tab .nav-tabs li a:hover:before,
.tab .nav-tabs li.active a:before{
    height: 170%;
    opacity: 1;
}
.tab .tab-content{
    padding: 20px 30px;
    margin-top: 10px;
    font-size: 15px;
    line-height: 27px;
    letter-spacing: 1px;
    position: relative;
}
@media only screen and (max-width: 479px){
    .tab .nav-tabs li{
        width: 100%;
        text-align: center;
        margin-bottom: 15px;
    }
    .tab .nav-tabs li:last-child{ margin-bottom: 0; }
    .tab .nav-tabs li a:hover:before,
    .tab .nav-tabs li.active a:before{ height: 400%; }
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            
        </div>
    </div>
</div>

<div class="priceplan">
  <div class="container">
    <div class="row"> 
    @if($errors->any())
      <h4>{{$errors->first()}}</h4>
      @endif
      
      @if(session()->has('message'))
      <div class="alert alert-success"> {{ session()->get('message') }} </div>
      @endif
      
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="plan"> 
        @if(session()->get('subscription')=="TRIAL")
          <h3 class="alert alert-success"><strong> Your Trail of 7 days have been started</strong></h3>
         @else
          @if(count($t)==0) 
          
            @if(session('subscription')=="NONE")
              <b><a class=' btn btn-block buybtn' href="{{url('/')}}/start-trial" style="width:200px;margin-left:45%;">Start Trial</a></b>
           
              <p>In this Trial you will just get basic package so you can understand the how the system works, it is one time offer and will be ended after 7 days.</p>
             @endif
             
          @else
          
          @if(session('subscription')=="NONE")
          <p class="alert alert-danger">You Trial has been ended in order to continue services, you need to subscribe to one of our packages</p>
          @else
          
          @endif
          
          @endif
          
          @endif
          
          <h2 style"text-aline:center;"><b>Choose yours Bilty online plan.</b></h2>
          
              @if(session('subscription')=="NONE")
              
              @else
              
              @if(session('subscription')=="TRIAL")
                <h3>Your Trial will be End at :  {{Carbon\Carbon::parse($customer->s_created)->addDays(7)->format('d-m-y')}}</h3>
         
              @else
                <h3>Your Next Renewal Date is:  {{Carbon\Carbon::parse($customer->s_created)->addDays($day)->format('d-m-y')}}</h3>
                
          @endif
           @endif
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="pricetable">
          <section class="pricing-table">
            <div class="container">
              <div class="row justify-content-md-center">
                  <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">1 Month</a></li>
                    <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">3 Month</a></li>
                    <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">6 Month</a></li>
                    <li role="presentation"><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab">1 Year</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                        
                        <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="item">
                    <div class="heading">
                      <h3>STARTER</h3>
                      <div class="row">
                        <label>
                          <input type="radio" name="colorRadio" value="red">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="green">
                          PKR</label>
                        <div class="red box">
                          <h3 style="color:#f9a848 !important;">$9/month</h3>
                        </div>
                        <div class="green box price">
                          <h3 style="color:#f9a848 !important;">PKR 2655/month</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/1.png"  alt="img"> @if(session('subscription')=='BASIC' && $mop !="cash" && $days != '30')
                      <button  class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      @if($mop == "cash" && session('subscription')=='BASIC' && $days == '30')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/BASIC" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModal">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/BASIC/1" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Cash Slip</h4>
                              </div>
                              <div class="info">
                                <p><strong>Info!</strong> Attach your cash slip</p>
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
                      <div class="row">
                        <label>
                          <input type="radio" name="colorRadio" value="black">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="white">
                          PKR</label>
                        <div class="black box">
                          <h3 style="color:#f9a848 !important;">$13/month</h3>
                        </div>
                        <div class="white box price">
                          <h3 style="color:#f9a848 !important;">PKR 3835/month</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/3.png"  alt="img"> @if(session('subscription')=='ESSENTIAL' && $mop !="cash" && $days != '30')
                      <button class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      @if($mop == "cash" && session('subscription')=='ESSENTIAL' && $days == '30')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/ESSENTIAL" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModal2">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModal2" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/ESSENTIAL/1" method="post" enctype="multipart/form-data">
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
                        <label>
                          <input type="radio" name="colorRadio" value="pink">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="yellow">
                          PKR</label>
                        <div class="pink box">
                          <h3 style="color:#f9a848 !important;">$16/month</h3>
                        </div>
                        <div class="yellow box price">
                          <h3 style="color:#f9a848 !important;">PKR 4720/month</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/2.png"  alt="img"> @if(session('subscription')=='PRO' && $mop !="cash" && $days != '30')
                      <button class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      
                      @if($mop == "cash" && session('subscription')=='PRO' && $days == '30')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/PRO" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModal3">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModal3" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/PRO/1" method="post" enctype="multipart/form-data">
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
                    <div role="tabpanel" class="tab-pane fade" id="Section2">
                        
                        <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="item">
                    <div class="heading">
                      <h3>STARTER</h3>
                      <div class="row">
                        <label>
                          <input type="radio" name="colorRadio" value="red">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="green">
                          PKR</label>
                        <div class="red box">
                          <h3 style="color:#f9a848 !important;">$18/3 months</h3>
                        </div>
                        <div class="green box price">
                          <h3 style="color:#f9a848 !important;">PKR 5310/3 months</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/1.png"  alt="img"> @if(session('subscription')=='BASIC' && $mop !="cash" && $months != '90')
                      <button  class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      @if($mop == "cash" && session('subscription')=='BASIC' && $months == '90')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/BASIC" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModals">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModals" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/BASIC/3" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Cash Slip</h4>
                              </div>
                              <div class="info">
                                <p><strong>Info!</strong> Attach your cash slip</p>
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
                      <div class="row">
                        <label>
                          <input type="radio" name="colorRadio" value="black">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="white">
                          PKR</label>
                        <div class="black box">
                          <h3 style="color:#f9a848 !important;">$39/3 months</h3>
                        </div>
                        <div class="white box price">
                          <h3 style="color:#f9a848 !important;">PKR 11,505/3 months</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/3.png"  alt="img"> @if(session('subscription')=='ESSENTIAL' && $mop !="cash" && $months != '90')
                      <button class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      @if($mop == "cash" && session('subscription')=='ESSENTIAL' && $months == '90')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/ESSENTIAL" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModals2">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModals2" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/ESSENTIAL/3" method="post" enctype="multipart/form-data">
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
                        <label>
                          <input type="radio" name="colorRadio" value="pink">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="yellow">
                          PKR</label>
                        <div class="pink box">
                          <h3 style="color:#f9a848 !important;">$48/3 months</h3>
                        </div>
                        <div class="yellow box price">
                          <h3 style="color:#f9a848 !important;">PKR 13,200/3 months</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/2.png"  alt="img"> @if(session('subscription')=='PRO' && $mop !="cash" && $months != '90')
                      <button class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      
                      @if($mop == "cash" && session('subscription')=='PRO' && $months == '90')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/PRO" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModals3">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModals3" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/PRO/3" method="post" enctype="multipart/form-data">
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
                    <div role="tabpanel" class="tab-pane fade" id="Section3">
                        
                        <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="item">
                    <div class="heading">
                      <h3>STARTER</h3>
                      <div class="row">
                        <label>
                          <input type="radio" name="colorRadio" value="red">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="green">
                          PKR</label>
                        <div class="red box">
                          <h3 style="color:#f9a848 !important;">$54/6 months</h3>
                        </div>
                        <div class="green box price">
                          <h3 style="color:#f9a848 !important;">PKR 15,930/6 months</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/1.png"  alt="img"> @if(session('subscription')=='BASIC' && $mop !="cash" && $monthss != '180')
                      <button  class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      @if($mop == "cash" && session('subscription')=='BASIC' && $monthss == '180')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/BASIC" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModalss">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModalss" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/BASIC/6" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Cash Slip</h4>
                              </div>
                              <div class="info">
                                <p><strong>Info!</strong> Attach your cash slip</p>
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
                      <div class="row">
                        <label>
                          <input type="radio" name="colorRadio" value="black">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="white">
                          PKR</label>
                        <div class="black box">
                          <h3 style="color:#f9a848 !important;">$78/6 months</h3>
                        </div>
                        <div class="white box price">
                          <h3 style="color:#f9a848 !important;">PKR 23,010/6 months</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/3.png"  alt="img"> @if(session('subscription')=='ESSENTIAL' && $mop !="cash" && $monthss != '180')
                      <button class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      @if($mop == "cash" && session('subscription')=='ESSENTIAL' && $monthss == '180')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/ESSENTIAL" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModalss2">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModalss2" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/ESSENTIAL/6" method="post" enctype="multipart/form-data">
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
                        <label>
                          <input type="radio" name="colorRadio" value="pink">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="yellow">
                          PKR</label>
                        <div class="pink box">
                          <h3 style="color:#f9a848 !important;">$96/6 months</h3>
                        </div>
                        <div class="yellow box price">
                          <h3 style="color:#f9a848 !important;">PKR 26,400/6 months</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/2.png"  alt="img"> @if(session('subscription')=='PRO' && $mop !="cash" && $monthss != '180')
                      <button class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      
                      @if($mop == "cash" && session('subscription')=='PRO' && $monthss == '180')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/PRO" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModalss3">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModalss3" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/PRO/6" method="post" enctype="multipart/form-data">
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
                    <div role="tabpanel" class="tab-pane fade" id="Section4">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                  <div class="item">
                    <div class="heading">
                      <h3>STARTER</h3>
                      <div class="row">
                        <label>
                          <input type="radio" name="colorRadio" value="red">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="green">
                          PKR</label>
                        <div class="red box">
                          <h3 style="color:#f9a848 !important;">$108/year</h3>
                        </div>
                        <div class="green box price">
                          <h3 style="color:#f9a848 !important;">PKR 31,860/year</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/1.png"  alt="img"> @if(session('subscription')=='BASIC' && $mop !="cash" && $year != '365')
                      <button  class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      @if($mop == "cash" && session('subscription')=='BASIC' && $year == '365')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/BASIC" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModalsss">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModalsss" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/BASIC/12" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Cash Slip</h4>
                              </div>
                              <div class="info">
                                <p><strong>Info!</strong> Attach your cash slip</p>
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
                      <div class="row">
                        <label>
                          <input type="radio" name="colorRadio" value="black">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="white">
                          PKR</label>
                        <div class="black box">
                          <h3 style="color:#f9a848 !important;">$156/year</h3>
                        </div>
                        <div class="white box price">
                          <h3 style="color:#f9a848 !important;">PKR 46,020/year</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/3.png"  alt="img"> @if(session('subscription')=='ESSENTIAL' && $mop !="cash" && $year != '365')
                      <button class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      @if($mop == "cash" && session('subscription')=='ESSENTIAL' && $year == '365')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/ESSENTIAL" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModalsss2">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModalsss2" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/ESSENTIAL/12" method="post" enctype="multipart/form-data">
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
                        <label>
                          <input type="radio" name="colorRadio" value="pink">
                          USD</label>
                        <label>
                          <input type="radio" name="colorRadio" value="yellow">
                          PKR</label>
                        <div class="pink box">
                          <h3 style="color:#f9a848 !important;">$192/year</h3>
                        </div>
                        <div class="yellow box price">
                          <h3 style="color:#f9a848 !important;">PKR 56,640/year</h3>
                        </div>
                      </div>
                      <img src="{{url('/')}}/img/2.png"  alt="img"> @if(session('subscription')=='PRO' && $mop !="cash" && $year != '365')
                      <button class="btn btn-block buybtn" disabled>SUBSCRIBED</button>
                      @if(!empty($a_id)) <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">cancel subscription</a> @endif
                      @elseif($check!=1)
                      
                      @if($mop == "cash" && session('subscription')=='PRO' && $year == '365')
                      <button class="btn btn-block buybtn" disabled>Already Subscribed</button>
                      @else <a href="{{url('/')}}/paypal/create-plan/PRO" class="btn btn-block buybtn">SUBSCRIBE WITH PAYPAL</a> @if(!empty($a_id))
                      <div class="or-seperator"><i>or</i></div>
                      <button class="btn btn-block buybtn" disabled>Subscribe with Cash Slip</button>
                      You have to cancel PayPal Subscription to subscribe the service with Cash Slips. Note: Your when you cancel the PayPal Subscription you will have access until the last date of subscription. <br>
                      <a href="{{url('/')}}/cancel-agreement/{{$a_id}}" onclick="return confirm('Are you sure, you want to cancel PayPal Subscription')">Click Here To Cancel</a> @else
                      <div class="or-seperator"><i>or</i></div>
                      <button type="button" class="btn btn-block buybtn" data-toggle="modal" data-target="#myModalsss3">SUBSCRIBE WITH CASH SLIP</button>
                      <div class="modal fade" id="myModalsss3" role="dialog">
                        <div class="modal-dialog"> 
                          
                          <!-- Modal content-->
                          <form action="{{url('/')}}/upload-cash-slip/PRO/12" method="post" enctype="multipart/form-data">
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
                      @endif
                      @else
                      <button class="btn btn-block buybtn" disabled>Already Slip Deposited wait for the reply</button>
                      @endif </div>
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
            </div>
                
                
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="container">
          <div class="tag-line">
            <h3>If you are subscribing with cash slip so use this account</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="container">
          <div class="bgwhite">
            <div class="col-lg-4">
              <div class="img" style="margin-top: 4vw;"> <img src="{{url('/')}}/img/bankicon.png" alt="img">
                <h4>Send to Account</h4>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="member-left-side">
                <div class="member-email clearfix"> <b>Account Name</b> <span>Green Grapez</span> </div>
                <div class="member-email clearfix"> <b>Account Number</b> <span>0205-0103723028</span> </div>
                <div class="member-email clearfix"> <b>Branch</b> <span>Y-block commercial DHA Lahore</span> </div>
                <div class="member-email clearfix"> <b>Branch Name</b> <span>Meezan Bank</span> </div>
              </div>
            </div>
          </div>
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