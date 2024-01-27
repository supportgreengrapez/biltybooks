@extends('client.layout.app')
@section('content')
<!--/ menu -->
<div class="container">
<form method="post" action="{{url('/')}}/edit-user/{{$u->id}}">
    {{csrf_field()}}
	<div class="row">
    <div class="col-lg-12">
		<div class="form_main">
                <div class="form">
                <h3><strong>Edit User Form</strong></h3>
                <label>User Name</label>
                <input type="text" required="" placeholder="" value="{{$u->username}}" name="username" class="txt">
            </div>
            </div>
            </div>
            <div class="col-md-6">
		<div class="form_main">
                
                <div class="form">
                <label>First Name</label>
                    <input type="text" required="" placeholder="" value="{{$u->fname}}" name="fname" class="txt">
            </div>
            </div>
            </div>
            <div class="col-md-6">
		<div class="form_main">
                <div class="form">
                <label>Last Name</label>
                    <input type="text" required="" placeholder="" value="{{$u->lname}}" name="lname" class="txt">
            </div>
            </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="form_main">
                <div class="form">
                <label>City</label>
                    <input type="text" required="" placeholder="" value="{{$u->city}}" name="city" class="txt">
            </div>
            </div>
				<div class="form_main">
                <div class="form">
                <label>Password</label>
                    <input type="password" required="" placeholder="" value="null" name="password" class="txt">
            </div>
            </div>
           		 <div class="form_main">
                <div class="form">
                <label>Confirm Password</label>
                    <input type="password" required="" placeholder="" value="null" name="cpassword" class="txt">
            </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="checkbox">
                    <label><input name="edit" type="checkbox" @if($u->edit_permission==1) checked @endif value="EDIT">EDIT</label>
                  </div>
                  <div class="checkbox">
                    <label><input name="delete" type="checkbox" @if($u->delete_permission==1) checked @endif value="DELETE">DELETE</label>
                  </div>
            
            
    </div>
	</div>
   
    <div class="text-center">
    	<button type="submit" name="submit" class="txt2"> Done </button>
    </div>
    
    </form>
</div>

@endsection