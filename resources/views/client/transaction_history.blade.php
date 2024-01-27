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
    	<h2>Transactions</h2>
    </div>
    
    <div class="table-responsive oder_form" id="order_form">
    
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                    <tr>
                        <th>ID</th>
                        <th>Slip</th>
                        
                        
                        <th>Subscription</th>
                        <th>Amount in USD</th>
                                                <th>Amount in PKR</th>
                        <th>status</th>
                        <th>reason</th>
                       
                    </tr>
                </thead>
                <tbody>
                  @if(count($c)>0)
                  @foreach($c as $ct)
                    <tr>
                        <td>{{$ct->id}}</td>
                    <td><a href="#" data-toggle="modal" data-target="#myModal{{$ct->id}}"><img src="{{url('/')}}/storage/images/{{$ct->file}}" class="img-responsive" alt="" style="width:40%;"></a></td>
                       
                        <td>{{$ct->subscription}}</td>
                        <td>${{$ct->amount}}</td>
                        <td>{{$ct->amount*121}} PKR</td>
                     
                        <th><span class="label label-success">{{$ct->status}}</span></th>
                        @if($ct->status=="declined")
                        <td>{{$ct->reason}}</td>
                        @else
                        <td>NA</td>
                        @endif
                    </tr>
                    
                          
<!-- Modal -->
<div id="myModal{{$ct->id}}" class="modal fade" role="dialog">
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
@endsection