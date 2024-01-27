@extends('admin.layout.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Decline Transaction</h3>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
              <form action="{{url('/')}}/admin-cash-transaction-decline-reason/{{$id}}" method="post">
                {{csrf_field()}}
                <textarea name="reason" id="" cols="60" rows="20"></textarea>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <br>
                <button type="submit">submit</button>
            </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    
   @endsection