@extends('layout.app')
@section('content')
<link rel="stylesheet" href="{{url('/')}}/css/main.css">
<link rel="stylesheet" href="{{url('/')}}/css/util.css">
<!--/ menu --> 
<div class="limiter">
		<div class="container-login100" style="background-image:
url('{{url('/')}}/img/home%20banner.png')">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif
      <form method="post" action="{{url('/')}}/login" class="login100-form validate-form">
          {{csrf_field()}}
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">User Email</span>
						<input class="input100" type="email" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#9993;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#x26BF;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="{{url('/')}}/reset/password">
							Forgot password?
						</a>
                        <a href="{{url('/')}}/register">
							<strong>sign up</strong>
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit"  class="login100-form-btn">
								Login
							</button>
                            
						</div>
                        
					</div>
					
				</form>
			</div>
		</div>
	</div> 
<!--footer-->
@endsection