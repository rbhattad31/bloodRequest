<?php
?>

<div class="container">
<div class="search-form-box">
	<form class="search-form-bs text-center" id="requestForm" role="form">
	<span id="captchaMsg" style="display: none"></span>
		<div class="row search-padding-bg">
		
			
				<div class="form-group-1">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
							<label class="iwant" for="usr">I want</label>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
							<input type="text" class="form-control bloodgroup"
								name="blood_group" id="bloodgroup" placeholder="Blood Group" />
						</div>
						<div stlyle="clear:both;"></div>
					</div>
                    <div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
							<label class="iwant" for="pwd">in</label>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
							<input type="text" class="form-control location" name="city"
								id="city" placeholder="Location" />
						</div>
						<div style="clear: both;"></div>
					</div>
					 <div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
							<label class="iwant" for="pwd">Area</label>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
							<input type="text" class="form-control location" name="area"
								id="area" placeholder="Location" />
						</div>
						<div style="clear: both;"></div>
					</div>
                    <div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
							<label class="iwant" for="usr">Number </label>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
							<input type="text" class="form-control mobile-icon"
								name="number" id="number" placeholder="Number" />
						</div>
						<div stlyle="clear:both;"></div>
					</div>
                    <div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
							<label class="iwant" for="pwd">Name</label>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
							<input type="text" class="form-control user-name" name="name"
								id="name" placeholder="Name" />
						</div>
						<div style="clear: both;"></div>
					</div>
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
							<label class="iwant" for="pwd">Date</label>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
							<input type="text" class="form-control calender" name="date"
								id="datepickerreq" placeholder=" Required Date (DD-MM-YYYY)" > 
						</div>
						<div style="clear: both;"></div>
					</div>
                    <div class="row">
                    <div class="col-xs-12">
							<div class="captcha-center-details2">
							<input type="text" class="captcha" name="captcha"  id="reqCaptcha" placeholder="Enter Text as Shown" /> 
							</div>
						</div>
                    </div>
				</div>
		
			
			<div style="clear: both;"></div>
		</div>
		
		<button type="button" id="reqBtn" class="btn btn-dgn">
			<i class="glyphicon glyphicon-search"></i> Submit Donation Request
		</button>
	</form>
</div>
</div>

