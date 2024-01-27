@extends('admin.layout.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Paypal Transaction</h3>
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
    <form method="post" action="{{url('/')}}/admin-get-paypal-transaction-date">
      {{csrf_field()}}
        <label for="">
        Start Date
      </label>
        <input name="start_date" type="date">
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
               
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                
                <th>Subscription</th>
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
           
                <td>{{$ct->username}}</td>
                <td>{{$ct->fname}}</td>
                <td>{{$ct->lname}}</td>
                <td>{{$ct->cs}}</td>
                <td>{{$ct->amount}}</td>
                 <td>{{$ct->amount*121}}</td>
              <td>{{ Carbon\Carbon::parse($ct->d)->format('d-m-y')}}</td>
                <th><span class="label label-success">{{$ct->status}}</span></th>
            </tr>
            @endforeach
            @endif
        </tbody>
                </table></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    
   @endsection