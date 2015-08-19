<?php
?>
<!-- signup  start here -->
<div id="signup-popup" class="ppInfo col-lg-6 col-md-8 col-sm-8 col-xs-12">
 <span class="button b-close regreset">X</span>
  <p class="form-tile"><span class="glyphicon glyphicon-user"></span> Registration </p>
		<form id="userForm" role="form">
			<span id="regerrorMsg" style="display: none"></span>
			<span id="regsucMsg" style="display: none"></span>
			<span id="regcaptchaMsg" style="display: none"></span>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group1">
							<input type="text" class="form-control user-name" name="name" id="name"
								placeholder="Full Name" required> 
						</div>
				</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="input-group1">
							<input type="text" class="form-control bdgp" name="blood_group"
								id="regbloodgroup" placeholder=" Blood Group" required> 
						</div>
					</div>
					<div style="clear:both;"></div>
				</div>
				<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group1">
							<input type="text" class="form-control locator" name="city" id="regcity"
								placeholder=" City" required> 
						</div>
					</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group1">
							<input type="text" class="form-control locator" name="state"
								id="regstate" placeholder=" State" disabled required /> 
						</div></div><div style="clear:both;"></div>
				</div>
				<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group1">
							<input type="text" class="form-control locator" name="area" id="regarea"
								placeholder=" Area" required> 
						</div>
					</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="input-group1">
							<input type="text" class="form-control datepicker calender" name="dob"
								id="datepicker" placeholder=" Date of Birth (DD-MM-YYYY)" required> 
						</div></div>
				</div>
		
			<div class="row">
					
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="input-group1">
							<input type="text" class="form-control mobile-icon" name="number" id="number"
								placeholder=" Mobile Number" required>
					</div>
					</div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
							<div style="margin-top:4px;">
								<label class="radio-inline"><b> Gender:</b> </label>
								<label class="radio-inline"> <input type="radio" name="gender" class="radio" value="M">Male</label>
								<label class="radio-inline"> <input type="radio" class="radio" name="gender" value="F">Female</label>
								<p class="gender-error-msg"></p>
							</div>
						</div>
					
			
				</div>
				</div>
				<div class="row">
				
					<textarea placeholder="Enter Your Address" name="address" class="address form-control"></textarea>
				
				
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="availability">
							<span>Availability</span>
							<div id="avil" class="btn-group btn-toggle btn-primary-R">
								<button type="button" value="Y" id="status"
									name="donation_status" class="btn btn-primary">Yes</button>
								<button type="button" value="N" id="status"
									name="donation_status" class="btn btn-default">No</button>
							</div></div>
							</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="captcha-center-details2 captch-div">
							<input type="text" class="captcha" name="captcha"  id="regCaptcha" placeholder="Enter Text as Shown" /> 
							</div>
						</div>
					</div>
				<button type="button" id="regButton" class="btn login-btn pull-right"><i class="glyphicon glyphicon-log-in"></i>  Register</button>
			</form>
</div>
		<!-- otp form  start here -->
	<div id="otp-req" class="ppInfo col-lg-6 col-md-8 col-sm-8 col-xs-12" style="display:none">	
			<form  id="otpForm" name="userForm">
				<span id="invalidOtpMsg" style="display: none;">Invalid OTP Code</span>
		 		<span class="button b-close regreset">X</span>
			 	 <p class="form-tile"><span class="glyphicon glyphicon-user"></span> OTP Details </p>
				<!----------start top_section----------->
					<span class="successMsg">OTP is sent to your mobile successfully</span>
					<div class="section">
						<div class="input-sign otp-center-details">
							<input type="text" name="otp" id="regotp"  class="otp-enter otp" placeholder="OTP Code" /> 
						</div>
						<div class="clear"> </div>
					</div>
					<div class="submit">
					<button id="otpButton" type="button"  class="btn login-btn pull-right">Validate</button>
					</div>
			</form>
		</div>
		
		
<!-- signup  end here -->
