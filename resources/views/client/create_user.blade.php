@extends('client.layout.app')
@section('content')
<!--/ menu -->
<div class="container">
<form method="post" action="{{url('/')}}/create-users">
    {{csrf_field()}}
	<div class="row">
	    @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
    <div class="col-lg-12">
		<div class="form_main">
                <div class="form">
                <h3><strong>Create User Form</strong></h3>
                <label>User Email</label>
                    <input type="email"  placeholder="" value="  " name="username" class="txt"   maxlength="50" required>
            </div>
            </div>
            </div>
            <div class="col-md-6">
		<div class="form_main">
                
                <div class="form">
                <label>First Name</label>
                    <input type="text"  placeholder="" value="" name="fname" class="txt"  pattern="[a-zA-Z0-9\s]+" maxlength="50" required>
            </div>
            </div>
            </div>
            <div class="col-md-6">
		<div class="form_main">
                <div class="form">
                <label>Last Name</label>
                    <input type="text"  placeholder="" value="" name="lname" class="txt"  pattern="[a-zA-Z0-9\s]+" maxlength="50" required>
            </div>
            </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="form_main">
                <div class="form">
                <label>City</label>
                    <input type="text"  placeholder="" value="" name="city" class="txt"  maxlength="50" required>
            </div>
            </div>
				<div class="form_main">
                <div class="form">
                <label>Password</label>
                    <input type="password"  placeholder="" value="" name="password" class="txt"  maxlength="50" required>
            </div>
            </div>
           		 <div class="form_main">
                <div class="form">
                <label>Confirm Password</label>
                    <input type="password"  placeholder="" value="" name="cpassword" class="txt"   maxlength="50" required>
            </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="checkbox">
                    <label><input name="edit" type="checkbox" value="EDIT">EDIT</label>
                  </div>
                  <div class="checkbox">
                    <label><input name="delete" type="checkbox" value="DELETE">DELETE</label>
                  </div>
            
            
    </div>
	</div>
   
    <div class="text-center">
    	<button type="submit" name="submit" class="txt2"> Done </button>
    </div>
    
    </form>
</div>

@endsection