@extends('layout.app')

@section('content')
@if(session()->has('username'))
<script>
    $(document).ready(function() {
        function disableBack() { window.history.forward() }

        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });
</script>
@endif
<section>
		<div class="main-banner ">
			<div class="container ">    
				<div class="row  " style="margin-top:20rem;">
					<div class="col-sm-6 col-md-6 col-md-offset-3">
								<div class="">
									
									<div class="panel-body ">
                                 
										<form role="form"  method="POST" action="{{url('/')}}/password/change/{{$username}}">
                                       
                                        {{ csrf_field() }}
										
											<fieldset>
												<!--<div class="row">-->
													<div class="center-block">
														<img class="profile-img"
															src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
													</div>
													
													<div class="panel-heading text-center login_content">
														<h2>Change Password</h2>
													</div>
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
												<!--</div>
												<div class="row">-->
													<div class="col-sm-12 col-md-10  col-md-offset-1 ">
														<div class="form-group">
															<div class="input-group">
																<span class="input-group-addon">
																	<i class="glyphicon glyphicon-user"></i>
																</span> 
																<input class="form-control input-lg" id="email" type="password" name="password" value="{{ old('email') }}" required>
                                                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
															</div>
														</div>
														<div class="form-group ">
															<button type="submit" class="btn btn-lg btn-primary btn-block" value="">Done </button>
														 
                                                        </div>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
									
						</div>
					</div>
				</div>
			</div>
	</section>
	
@endsection
