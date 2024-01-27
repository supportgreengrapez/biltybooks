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
    	<h2>Order Tracking</h2>
    </div>
    @if(session('subscription')!="NONE")
    <a class="btn btn-default btnn" href="{{url('/')}}/add-record" style="margin-bottom:10px;">Add Record</a>
    @endif
    <div class="table-responsive oder_form" id="order_form">
    
    <table id="example" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%"  style="color:black;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Bilty NO</th>
                <th>Bilty Type</th>
                <th>Sender Company</th>
                <th>Receiver Company</th>
                <th>Goods Company</th>
                <th>Date Receiving</th>
                <th>Date Booking</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($records)>0)
            @foreach($records as $r)
            <tr>
            <td>{{$r->id}}</td>
                <td>{{$r->bilty_number}}</td>
                <td>{{$r->bilty_type}}</td>
                <td>{{$r->sender_company}}</td>
                <td>{{$r->receiver_company}}</td>
                <td>{{$r->goods_company}}</td>
                @if($r->date_of_receiving == "")
                <td>{{$r->date_of_receiving}}</td>
                @else 
                    <td>{{ Carbon\Carbon::parse($r->date_of_receiving)->format('d-m-y')}}</td>
              
                @endif
                @if($r->date_of_booking == "")
                <td>{{$r->date_of_booking}}</td>
                @else
                <td>{{ Carbon\Carbon::parse($r->date_of_booking)->format('d-m-y')}}</td>
                @endif
                @if(session('subscription')!="NONE")
            <td><a href="{{url('/')}}/view-record/{{$r->id}}">View</a>  @if(session('edit_permission')==1)
                <a href="{{url('/')}}/edit-record/{{$r->id}}">Edit</a>  
                @endif @if(session('delete_permission')==1)
                
                <a href="{{url('/')}}/delete-record/{{$r->id}}">Delete</a>
                @endif </td>
                @endif
            
            
            </tr>
           
            @endforeach
            @endif
        </tbody>
    </table>
    </div>
    </div>
    </div>
</div>
@endsection