<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email Template</title>
</head>

<body>
<!--
Responsive Email Template by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div id="mailsub" class="notification" align="center">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tbody><tr><td align="center" bgcolor="#eff3f8">


<!--[if gte mso 10]>
<table width="680" border="0" cellspacing="0" cellpadding="0">
<tr><td>
<![endif]-->

<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
    <tbody><tr><td>
	<!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;">&nbsp;</div>
	</td></tr>
	<!--header -->
	<tr><td align="center" bgcolor="#ffffff">
		<!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tbody><tr><td align="left"><!-- 

				Item --><div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;">
					<table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
						<tbody><tr><td align="left" valign="middle">
							<!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div>
							<table width="115" border="0" cellspacing="0" cellpadding="0">
								<tbody><tr><td align="left" valign="top" class="mob_center">
									<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
									<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
									<img src="{{URL('/')}}/images" alt="Metronic" border="0" style="display: block;"></font></a>
								</td></tr>
							</tbody></table>						
						</td></tr>
					</tbody></table></div><!-- Item END--><!--[if gte mso 10]>
					</td>
					<td align="right">
				<![endif]--><!-- 

				Item --><div class="mob_center_bl" style="float: right; display: inline-block; width: 88px;">
					<table width="88" border="0" cellspacing="0" cellpadding="0" align="right" style="border-collapse: collapse;">
						<tbody><tr><td align="right" valign="middle">
							<!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div>
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tbody><tr><td align="right">
									<!--social -->
									<div class="mob_center_bl" style="width: 88px;">
									<table border="0" cellspacing="0" cellpadding="0">
										<tbody><tr><td width="30" align="center" style="line-height: 19px;">
											<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
											<font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
											<img src="image/fb-icon1.png" width="30" height="30" alt="Facebook" border="0" style="display: block;"></font></a>
										</td><td width="39" align="center" style="line-height: 19px;">
											<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
											<font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
											<img src="image/twitter-icon1.png" width="30" height="30" alt="Twitter" border="0" style="display: block;"></font></a>
										</td><td width="29" align="right" style="line-height: 19px;">
											<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
											<font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
											<img src="image/gp-icon1.png" width="30" height="30" alt="Dribbble" border="0" style="display: block;"></font></a>
										</td></tr>
									</tbody></table>
									</div>
									<!--social END-->
								</td></tr>
							</tbody></table>
						</td></tr>
					</tbody></table></div><!-- Item END--></td>
			</tr>
		</tbody></table>
		<!-- padding --><div style="height: 50px; line-height: 50px; font-size: 10px;">&nbsp;</div>
	</td></tr>
	<!--header END-->

	<!--content 1 -->
	<tr><td align="center" bgcolor="#fbfcfd">
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tbody><tr><td align="center">
				<!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;">&nbsp;</div>
				<div style="line-height: 44px;">
					<font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
						Password Reset 
					</span></font>
				</div>
				<!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;">&nbsp;</div>
			</td></tr>
			<tr><td>
				<div style="line-height: 24px;">
					<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
                    <b>Hello {{$customer_name}},</b><br>
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						 We noticed you requested password reset on entrelance.com. Here is the URL where you can reset your password: <a href="{{URL('/')}}/verify/{{$customer_username}}/{{$customer_verification_code}}">click here</a> 


					</span><br><br>
                    <span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;"><b>*This URL is only valid for 30 minutes</b></span>
                    </font>
				</div>
				<!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;">&nbsp;</div>
			</td></tr>
            
			
		</tbody></table>		
	</td></tr>
	<!--content 1 END-->
	<!--footer -->
	<tr><td class="iage_footer" align="center" bgcolor="#ffffff" style="padding-top:15px;">
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody><tr><td align="center">
				<font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
					2018 © Entrelance. ALL Rights Reserved.
				</span></font>				
			</td></tr>			
		</tbody></table>
		
		<!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>	
	</td></tr>
	<!--footer END-->
	<tr><td>
	<!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;">&nbsp;</div>
	</td></tr>
</tbody></table>
<!--[if gte mso 10]>
</td></tr>
</table>
<![endif]-->
 
</td></tr>
</tbody></table>
			
</div> 


</body>
</html>
