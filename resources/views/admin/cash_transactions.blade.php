@extends('admin.layout.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Cash Transaction</h3>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
                @if($errors->any())
                <h4>{{$errors->first()}}</h4>
                @endif
                @if(session()->has('message'))
        <div class="alert alert-success">
        {{ session()->get('message') }}
        </div>
        @endif
        @if(session()->has('emessage'))
    <div class="alert alert-danger">
    {{ session()->get('emessage') }}
    </div>
    @endif
    <form method="post" action="{{url('/')}}/admin-get-transaction-date/complete">
      {{csrf_field()}}
        <label for="">
        Start Date
      </label>
        <input  name="start_date" type="date">
        <label for="">
            End Date
          </label>
            <input name="end_date" type="date">
          <button class="btn btn-danger" type="submit">Search</button>
      </form>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
                  <div class="table-responsive">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
            <tr>
                <th>ID</th>
                <th>Slip</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                
                <th>Subscription</th>
                <th>No of Days</th>
                <th>Amount in USD</th>
                                <th>Amount in PKR</th>
                <th>Status</th>
                  <th>Created_at</th>
               
            </tr>
        </thead>
        <tbody>
          @if(count($c)>0)
          @foreach($c as $ct)
            <tr>
                <td>{{$ct->cid}}</td>
                <td><a href="#" data-toggle="modal" data-target="#myModal{{$ct->cid}}"><img src="{{url('/')}}/storage/images/{{$ct->file}}" class="img-responsive" alt="" style="width:40%;"></a></td>
                <td>{{$ct->username}}</td>
                <td>{{$ct->fname}}</td>
                <td>{{$ct->lname}}</td>
                <td>{{$ct->cs}}</td>
                <td>{{$ct->days}}</td>
                <td>${{$ct->amount}}</td>
                <td>{{$ct->amount*158.28}}</td>
                <th><span class="label label-success">{{$ct->status}}</span></th>
                <td>{{ Carbon\Carbon::parse($ct->d)->format('d-m-y')}}</td>
            </tr>
            
            
         

<!-- Modal -->
<div id="myModal{{$ct->cid}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">PICTURE PREVIEW</h4>
      </div>
      <div class="modal-body">
      <img src="{{url('/')}}/storage/images/{{$ct->file}}" class="img-responsive" alt="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
            @endforeach
            @endif
        </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 

   @endsection