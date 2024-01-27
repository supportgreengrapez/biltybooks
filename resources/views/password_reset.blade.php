@extends('layout.app')

@section('content')
<link rel="stylesheet" href="{{url('/')}}/css/main.css">
<link rel="stylesheet" href="{{url('/')}}/css/util.css">
@if(session()->has('username'))
<script>
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>
@endif
<div class="limiter">
		<div class="container-login100" style="background-image:
url('{{url('/')}}/img/home%20banner.png')">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                                 
										<form role="form"  method="POST" action="{{url('/')}}/password/reset">
                                       
                                        {{ csrf_field() }}
										
													  @if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
                                                       @if ($errors->has('password'))
                                    <span class="col-sm-6 col-md-6 col-md-offset-3 help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
											<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">User Email</span>
						<input class="input100" type="email" name="email" value="{{ old('email') }}" required placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit"  class="login100-form-btn">
								Submit
							</button>
                            
						</div>
                        
					</div>
											
								</form>
								</div>
								</div>
								</div>
	
@endsection
