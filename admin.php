<?php
?>
<!-- edit admin profile for user start here -->

<div id="admin-login" class="ppInfo col-lg-8 col-md-8 col-sm-8 col-xs-12 edituserform">
	
 <span class="button b-close">X</span>
  <p class="form-tile"><span class="glyphicon glyphicon-user"></span> Admin</p>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs admin-tabs" role="tablist">
				<li class="active"><a href="#addmember" role="tab"
					data-toggle="tab"> Add Member</a></li>
				<li><a href="#addmembers" role="tab" data-toggle="tab"> <i
						class="fa fa-user"></i> Add  Members
				</a></li>
				<li><a href="#editmembers" role="tab" data-toggle="tab"> <i
						class="fa fa-user"></i> edit
				</a></li>
				
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane fade active in" id="addmember">
	<div  id="signup-popup-admin"><form id="adminForm" role="form">
	<span id="adminsuccessMsg" style="display: none"></span>
			<span id="adminerrorMsg" style="display: none"></span>
			
			<span id="admincaptchaMsg" style="display: none"></span>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

				

						<div class="input-group1">
							<input type="text" class="form-control user-name" name="name" id="name"
								placeholder=" Full Name" required> 
						</div>
			


				</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

			

						<div class="input-group1">
							<input type="text" class="form-control bdgp" name="blood_group"
								id="adminbloodgroup" placeholder=" Blood Group" required> 
						</div>
					</div>

				<div style="clear:both;"></div>
				</div>
				<div class="row">
				
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

					

						<div class="input-group1">
							<input type="password" class="form-control l-pwd" name="password"
								id="NNpassword" placeholder=" Password" required> 
						</div>
			
				</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

					

						<div class="input-group1">
							<input type="password" class="form-control l-pwd" name="adminpassword"
								id="adminpassword" placeholder=" Confirm Password" required> 
						</div>
			
				</div>
				<div style="clear:both;"></div>
				</div>
		
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

				

						<div class="input-group1">
							<input type="text" class="form-control locator" name="city" id="admincity"
								placeholder=" City" required> 
						</div>
					</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

		

						<div class="input-group1">
							<input type="text" class="form-control locator" name="state"
								id="adminstate" placeholder=" State" disabled required /> 
						</div>
			
				</div>
			
	
	<div style="clear:both;"></div>
				</div>
		
			<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				

						<div class="input-group1">
							<input type="text" class="form-control datepicker calender" name="dob"
								id="dob" placeholder=" Date of Birth" required> 
						</div>

				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


						<div class="input-group1">
							<input type="text" class="form-control mobile-icon" name="number" id="number"
								placeholder=" Mobile Number" required>
						</div>
	
				</div>
	

							
	<div style="clear:both;"></div>
				</div>
				<div class="row">
	
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				
						<textarea placeholder="Enter Your Address" class="address form-control"></textarea>

		
				</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						

					<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="availability">
							<span>Availability</span>
							<div id="avil" class="btn-group btn-toggle btn-primary-A">
								<button type="button" value="Y" id="status"
									name="donation_status" class="btn btn-primary">Yes</button>
								<button type="button" value="N" id="status"
									name="donation_status" class="btn btn-default">No</button>
							</div>
	
					</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="captcha-center-details2">
							<input type="text" class="captcha" name="captcha"  id="adminCaptcha" /> 
						</div>
					</div>
					
					</div>

				
		
				</div>
											
	<div style="clear:both;"></div>
				</div>
				
			

		<div class="row">
									
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<label class="radio-inline"> Gender: </label> <label
							class="radio-inline"> <input type="radio" name="gender" value="M">Male
						</label> <label class="radio-inline"> <input type="radio"
							name="gender" value="F">Female
						</label>
	</div>
				</div>
			<button type="button" id="adminButton"
				class="btn admin-btn pull-right"><i class="glyphicon glyphicon-log-in"></i>  Add Member</button>
			
				
		</form></div>
					
				</div>
				<div class="tab-pane fade" id="addmembers">
				<span id="reseterrMsg" style="display:none" ></span>
				 <form action="" enctype="multipart/form-data">

    <!-- Redirect browsers with JavaScript disabled to the origin page -->
    <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
    <div class="fileupload-buttonbar">
        <div class="fileupload-buttons">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <span class="fileinput-button  center-block1">
              
                <input type="file" id="Uploadfile" name="file" multiple>
            </span>
            <button type="button" id="UploadButton" class="start">Start upload</button>
            <button type="reset" class="cancel">Cancel upload</button>

            <!-- The global file processing state -->
            <span class="fileupload-process"></span>
        </div>
        <!-- The global progress state -->
        <div class="fileupload-progress fade" style="display:none">
            <!-- The global progress bar -->
            <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            <!-- The extended global progress state -->
            <div class="progress-extended">&nbsp;</div>
        </div>
    </div>
    <!-- The table listing the files available for upload/download -->
    <table role="presentation"><tbody class="files"></tbody></table>
</form>
 
					
				</div>
<div class="tab-pane fade" id="editmembers">


<div class="admin-edit">
  <h2>Table</h2>
  <p>Using all the table classes on one table:</p>                                          
  <table id="adminjsontable" class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Mobile Number</th>
       
        <th>Blood Group</th>
        <th>City</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
     
    
    </tbody>
  </table>
</div>
<button id="btn2">Append list item</button>
					
				</div>
			</div>
		</div>



<script>	
$(document).ready(function(){
$("a.admin-loginform").click(function(){
	$('#admin-login').bPopup({
		
	    speed: 450,
        fadeSpeed: 'slow',
        modalColor: '#000',
    
        opacity: 0.8,
        modalClose: false,
        transition: 'slideIn'
	});

});
});
</script>







<!-- edit profile end here -->