@extends('client.layout.app')
@section('content')
<!--/ menu -->
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
	<div class="content_salogan">
    	<h2>Bilty Detail</h2>
    </div>
    <div class="oder_form" id="order_form" style="margin:0 auto; float:none; width:70%">
    <div class="right_col" role="main">
      <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content" style="width:80%;">
                  <div class="img">
                    	<img src="{{url('/')}}/img/Untitled-7.png" alt="img">
                    </div>
                <div class="member-left-side">
                  <div class="member-email clearfix"> <b>Bilty Number</b> <span>{{$r->bilty_number}}</span> </div>
                   <div class="member-email clearfix"> <div class="col-lg-6 nomarjin nopadding"><b>Quantity</b></div> <div class="col-lg-6  nomarjin nopadding"><span>{{$r->quantity}}</span> </div></div>
                 
                  <div class="member-email clearfix"> <b>Charge To</b> <span>{{$r->charge_to}}</span> </div>
                  <div class="member-email clearfix"> <b>To Record</b> <span>{{$r->to_record}}</span> </div>
                  <div class="member-email clearfix"> <b>Notes</b> <span>{{$r->notes}}</span> </div>
                  <div class="member-email clearfix"><div class="col-lg-6 nomarjin nopadding"><b>Description</b></div>
                  <div class="col-lg-6  nomarjin nopadding"><span>{{$r->description}}</span> </div></div>
                  <div class="member-email clearfix"> <b>Sender Company</b> <span>{{$r->sender_company}}</span> </div>
                  <div class="member-email clearfix"> <b>Receiver Company</b> <span>{{$r->receiver_company}}</span> </div>
                  <div class="member-email clearfix"> <b>Sender City</b> <span>{{$r->sender_city}}</span> </div>
                  <div class="member-email clearfix"> <b>Receiver City</b> <span>{{$r->receiver_city}}</span> </div>
               
                  <div class="member-email clearfix"> <b>Date Of Booking</b> <span>{{$r->date_of_booking}}</span> </div>
                  <div class="member-email clearfix"> <b>Date of Receiving</b> <span>{{$r->date_of_receiving}}</span> </div>
                  <div class="member-email clearfix"><b>Bilty Charges</b> <span>{{$r->bilty_charges}}</span> </div>
                  <div class="member-email clearfix"> <b>Bundle</b> <span>{{$r->bundles}}</span> </div>
                     <div class="member-email clearfix"> <div class="col-lg-6 nomarjin nopadding"><b>Goods Company</b></div><div class="col-lg-6 nomarjin nopadding"> <span>{{$r->goods_company}}</span> </div></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!--<div class="oder_form" id="order_form">-->
    <!--<div class="right_col" role="main">-->
    <!--  <div class="">-->
    <!--    <div class="clearfix"></div>-->
    <!--    <div class="row">-->
    <!--      <div class="col-md-12 col-sm-12 col-xs-12">-->
    <!--        <div class="x_panel">-->
    <!--          <div class="x_content">-->
              		
    <!--            <div class="member-left-side">-->
               
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    <!--</div>-->
    <!--<div class="oder_form" id="order_form">-->
    <!--<div class="right_col" role="main">-->
    <!--  <div class="">-->
    <!--    <div class="clearfix"></div>-->
    <!--    <div class="row">-->
    <!--      <div class="col-md-6 col-sm-6 col-xs-12">-->
    <!--        <div class="x_panel">-->
    <!--          <div class="x_content" style="width:100%;">-->
    <!--          		<div class="img">-->
    <!--                	<img src="{{url('/')}}/img/Untitled-4.png" alt="img">-->
    <!--                </div>-->
    <!--            <div class="member-left-side">-->
                  
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="col-md-6 col-sm-6 col-xs-12">-->
    <!--        <div class="x_panel">-->
    <!--          <div class="x_content" style="width:100%;">-->
    <!--          		<div class="img">-->
    <!--              <img src="{{url('/')}}/img/Untitled-3.png" alt="img">-->
    <!--                </div>-->
    <!--            <div class="member-left-side">-->
                  
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    <!--</div>-->
    <!--<div class="oder_form" id="order_form">-->
    <!--<div class="right_col" role="main">-->
    <!--  <div class="">-->
    <!--    <div class="clearfix"></div>-->
    <!--    <div class="row">-->
    <!--      <div class="col-md-6 col-sm-6 col-xs-12">-->
    <!--        <div class="x_panel">-->
    <!--          <div class="x_content">-->
    <!--            <div class="member-left-side">-->
                  
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="col-md-6 col-sm-6 col-xs-12">-->
    <!--        <div class="x_panel">-->
    <!--          <div class="x_content">-->
    <!--            <div class="member-left-side">-->
                  
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    
    <!--</div>-->
    </div>
    </div>
</div>
@endsection