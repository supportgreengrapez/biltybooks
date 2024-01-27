@extends('client.layout.app')
@section('content')
<!--/ menu -->
<div class="bgclr">
<div class="container">
<div class="row">
	<div class="col-lg-12">
    	<div class="content_salogan">
        	<h2>Dashboard</h2>
        </div>
    </div>
		<div class="col-lg-3 col-md-3 col-sm-12">
        <div class="oder_form " style="border:0px; width:100%;">
    <div class="right_col" role="main">
      <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="text-align:center;">
              <div class="x_content" style="width:60%;">
                <a href="{{url('/')}}/records-view"><div class="member-left-side">
                  <h2>Bilty Records<br><span style="font-size:16px;">Total Records</span></h2>
                  <div class="c100 p50 big">
                    <span>{{$r_c}}</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
                </div></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
        </div>
        @if(session('type')=="client_owner")
        <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="oder_form " style="border:0px;width:100%;">
    <div class="right_col" role="main">
      <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="text-align:center;">
              <div class="x_content" style="width:63%;">
                <a href="{{url('/')}}/manage-users"><div class="member-left-side">
                  <h2>Manage Users<br><span style="font-size:16px;">Total Users</span></h2>
                  <div class="c100 p50 big">
                    <span>{{$m_user}}</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
                </div></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
        </div>
        @endif
        <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="oder_form " style="border:0px; width:100%;">
    <div class="right_col" role="main">
      <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="text-align:center;">
              <div class="x_content" style="width:60%;">
                <a href="{{url('/')}}/records-view"><div class="member-left-side">
                  <h2>Bilty Records<br><span style="font-size:16px;">Total Out</span></h2>
                  <div class="c100 p50 big">
                    <span>{{$out}}</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
                </div></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="oder_form " style="border:0px; width:100%;">
    <div class="right_col" role="main">
      <div class="">
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel" style="text-align:center;">
              <div class="x_content" style="width:60%;">
                <a href="{{url('/')}}/records-view"><div class="member-left-side">
                  <h2>Bilty Records<br><span style="font-size:16px;">Total In</span></h2>
                  <div class="c100 p50 big">
                    <span>{{$result}}</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
                </div>
                </div></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
        </div>
    </div>
</div>
</div>
@endsection