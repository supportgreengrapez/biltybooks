@extends('layout.app')
@section('content')
<!--/ menu --> 
<!-- Banner -->
<div class="support_bg"> 
  <!--- END CONTAINER --> 
</div>
<!--/ Banner -->
<div class="container">
<div class="row">

    <div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3">
    	<div class="contactus">
           	<form>
	<div class="row">
    <div class="col-lg-12">
		<div class="form_main">
                <div class="form">
                <h3><strong>Contact Us</strong></h3>
                <label>User Name</label>
                    <input type="text" required="" placeholder="" value="" name="text" class="txt">
            </div>
            </div>
            </div>
            <div class="col-lg-12">
		<div class="form_main">
                
                <div class="form">
                <label>	Your Email</label>
                    <input type="email" required="" placeholder="" value="" name="text" class="txt">
            </div>
            </div>
            </div>
            <div class="col-lg-12">
		<div class="form_main">
                <div class="form">
                <label>Subject</label>
                    <input type="text" required="" placeholder="" value="" name="text" class="txt">
            </div>
            </div>
            </div>
            <div class="col-lg-12">
		<div class="form_main">
                <div class="form">
                <label for="exampleFormControlTextarea1">Your Message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
            </div>
            </div>
            
            
            
	</div>
   
    <div class="text-center">
    	<input type="submit" value="Send" name="submit" class="txt2">
    </div>
    
    </form>
        </div>
    </div>
</div>
  
</div>
@endsection