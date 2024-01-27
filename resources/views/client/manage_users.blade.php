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
    	<h2>Users List</h2>
    </div>
    @if(session('subscription')!="NONE")
    <a class="btn btn-default btnn" href="{{url('/')}}/create-users" style="margin-bottom:10px;">CREATE USER</a>
    @endif
     <div class="  filterable">
    <div class="panel-heading panalcolor">
                <h3 class="panel-title">Users</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-sm btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
    <div class="table-responsive oder_form" id="order_form">
    
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="color:black;">
        <thead>
            <tr class="filters">
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>City <input type="text" class="form-control" placeholder="" disabled></th>
                <th>Access</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(count($su)>0)
            @foreach($su as $u)
            <tr>
            <td>{{$u->username}}</td>
                <td>{{$u->fname}}</td>
                <td>{{$u->lname}}</td>
              <td>{{$u->city}}</td>
                <td>@if($u->edit_permission ==1)<label class="label label-success">EDIT</label> @endif @if($u->delete_permission ==1) <label class="label label-success">DELETE</label> @endif </td>
                @if(session('subscription')!="NONE")
                <td><span><a href="{{url('/')}}/edit-user/{{$u->id}}">Edit</a></span> <span><a href="{{url('/')}}/delete-user/{{$u->id}}">Delete</a></span></td>
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
</div>
@endsection