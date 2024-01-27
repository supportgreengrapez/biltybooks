@extends('client.layout.app')
@section('content')
<!--/ menu -->
<div class="container">
<form method="post" action="{{url('/')}}/profile/edit">
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
                <h3><strong>Profile Edit</strong></h3>
                
            </div>
            </div>
            </div>
            <div class="col-md-6">
		<div class="form_main">
                
                <div class="form">
                <label>First Name</label>
                <input type="text"  placeholder="" value="{{$user->fname}}" name="fname" class="txt"  pattern="[a-zA-Z0-9\s]+" maxlength="20" >
            </div>
            </div>
            </div>
            <div class="col-md-6">
		<div class="form_main">
                <div class="form">
                <label>Last Name</label>
                    <input type="text"  placeholder="" value="{{$user->lname}}" name="lname" class="txt"  pattern="[a-zA-Z0-9\s]+" maxlength="20" >
            </div>
            </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
				<div class="form_main">
                <div class="form">
                <label>Password</label>
                    <input type="password"  placeholder="" value="null" name="password" class="txt"  pattern="[a-zA-Z0-9\s]+" maxlength="20" >
            </div>
            </div>
           		
            </div>
            
	</div>
   
    <div class="text-center">
    	<button type="submit" name="submit" class="txt2"> Done </button>
    </div>
    
    </form>
</div>

@endsection