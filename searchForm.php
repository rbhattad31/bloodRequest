<?php
?>

<div class="container">
	
		<form class="search-form-bs text-center" id="searchForm" role="form">
		<div class="row search-padding-bg">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		 <div class="form-group-1">
		 		<div class="row">
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"><label class="iwant" for="usr">I want</label></div>
  		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
 <input type="text" class="form-control bloodgroup" name="bloodgroup" id="bloodgroup" placeholder="Blood Groop" />
					</div>
					<div stlyle="clear:both;"></div>
</div></div></div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

<div class="form-group-1">
	<div class="row">
  <div class="col-lg-1 col-md-1 col-sm-2 col-xs-12"><label class="iwant" for="pwd">in</label></div>
    		<div class="col-lg-11 col-md-11 col-sm-10 col-xs-12">
   <input type="text" class="form-control location" name="city" id="city" placeholder="Location" />
</div>
<div style="clear:both;"></div>
</div></div>
	</div>	
<div style="clear:both;"></div>	
</div>
<button type="button" id="searchBtn" class="btn btn-dgn"><i class="glyphicon glyphicon-search"></i>	 Get Donor</button>
		</form>
	
</div>
<div id="table" class="ppInfo col-lg-10 col-md-10 col-sm-10 col-xs-12">

 <span class="button b-close">X</span>


  <p class="form-tile"><span class="glyphicon glyphicon-search"></span> Search Results </p>
  <div class="table-responsive">
  	<table id="jsontable" class="table">

		<thead>
			<tr>
				<th>Name</th>
				<th>city</th>
				<th>Number</th>
				<th>Blood Group</th>
			</tr>
		</thead>
	</table>
	</div>
	</div>

