@extends('admin.layout.app')
@section('content')
    <!-- page content -->
     <div class="right_col" role="main"> 
<div class="page-title">
          <div class="title_left">
            <h3>User Detail</h3>
          </div>
        </div>
        <div class="img">
        <img src="{{url('/')}}/admin1/images/ece15e93a6b11187b7477f4618dd5313.png" alt="img">
                    </div>
                   <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel"  style="width:60%;margin:0 auto; border:0px; display:block; background-color:transparent;">
              <div class="x_content"  style="background-color:#FFFFFF; margin-bottom:5px;">
                <div class="member-left-side">
                  <div class="member-email clearfix"> <b>Id</b> <span>{{$user->id}}</span> </div>
                  <div class="member-email clearfix"> <b>Customer Email</b> <span>{{$user->username}}</span> </div>
                  <div class="member-email clearfix"> <b>Phone No</b> <span>{{$user->phone_number}}</span> </div>
                  <div class="member-email clearfix"> <b>City</b> <span>{{$user->city}}</span> </div>
                  <div class="member-email clearfix"> <b>Country </b> <span>{{$user->country}}</span> </div>
                  <div class="member-email clearfix"> <b>Subscription </b> <span>{{$user->subscription}}</span> </div>
                </div>
              </div>
            </div>
          </div>
          <!--<div class="col-md-12 col-sm-12 col-xs-12">-->
          <!--  <div class="x_panel"  style="width:60%;margin:0 auto; border:0px; display:block; background-color:transparent;">-->
          <!--    <div class="x_content" style="background-color:#FFFFFF; margin-bottom:5px;">-->
          <!--      <div class="member-left-side">-->
                  
                  
          <!--      </div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
          
        </div>
    </div>
    
	@endsection