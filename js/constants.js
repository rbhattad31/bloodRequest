
/**
 * 
 */
url = 'http://localhost/bloodRequest/bdApi/index.php';


function validateCaptcha(captcha,hash,callback){
	
	$.ajax({
    	type: 'POST',
   		url: url+'/validate/captcha',
		dataType: 'json',
		 data: {captcha: captcha,hash : hash},
    	success: function(data)
     		{
    		callback(data);
    		},
     		error: function(xhr, error){
     	        
     		 }
		});
}

function getDistrictValues(state){
	 $.ajax({
           type: 'GET',
           url: url+'/lookupId/district/'+state,
			dataType: 'json',
           success: function(data)
             {
          	 $('#district').empty();
			   $('#district')
	             .append($("<option></option>")
	             .attr("value", "")
	             .text("District"));
			   data.forEach( function (item)
           			{
				     $("#district").append($("<option></option>")
		             .attr("value", item.lookup_id)
		             .text(item.lookup_value));
				  });
			   $("#state").val(state);
				}
    		});
		
   
}

function getCityValues(district){
		$.ajax({
           type: 'GET',
           url: url+'/lookupId/city/'+district,
			dataType: 'json',
           success: function(data)
             {
           	$('#city').empty();
				   $('#city')
		             .append($("<option></option>")
		             .attr("value", "")
		             .text("City"));
				   data.forEach( function (item)
	            			{
					      $("#city").append($("<option></option>")
			             .attr("value", item.lookup_id)
			             .text(item.lookup_value));
					   
	            	});
				   $("#district").val(district);
				  }
    		});
	
}

function getAreaValues(city,callback){
	$.ajax({
       type: 'GET',
       url: url+'/lookupId/area/'+city,
		dataType: 'json',
       success: function(data)
         {
       	$('#area').empty();
			 $('#area')
	             .append($("<option></option>")
	             .attr("value", "")
	             .text("Area"));
			   data.forEach( function (item)
           		{
					   $("#area").append($("<option></option>")
		             .attr("value", item.lookup_id)
		             .text(item.lookup_value));
				});
			   
			   callback();
			  }
		});

}

function getStateValues(){
	$("#state").empty();
	$("#state").append($("<option></option>")
            .attr("value", "")
            .text("State"));
	$.ajax({
        type: 'GET',
        url: url+'/lookupType/1',
			dataType: 'json',
        success: function(data)
          {
        	data.forEach( function (item)
        			{
        			    	 $("#state").append($("<option></option>")
		 			             .attr("value", item.lookup_id)
		 			             .text(item.lookup_value));
        			    
        			});
        	
				}
 		});
}
function getBloodGroupValues(){
	 
		$("#bloodgroup").empty();
		
		$("#bloodgroup").append($("<option></option>")
	             .attr("value", "")
	             .text("Blood Group"));
		
		
		$.ajax({
           type: 'GET',
           url: url+'/lookupType/4',
			dataType: 'json',
           success: function(data)
             {
           	data.forEach( function (item)
           			{
           			    	 $("#blood_group").append($("<option></option>")
		 			             .attr("value", item.lookup_id)
		 			             .text(item.lookup_value));
           			    
           			});
				}
    		});
		
}

function sendOtp(number,callback){
	$.ajax({
        type: 'POST',
        url: url+'/sendOTP/'+number,
        data: {newnumber: number,oldnumber: userDetails.number},
		dataType: 'json',
        success: function(data)
          {
        	callback(data);
          }
 		});
}

function validateOTP(otp,number,callback){

$.ajax({
	type: 'POST',
		url: url+'/validate/validateotp',
	dataType: 'json',
	 data: {otp:otp,number: userDetails.number},
	success: function(data)
 		{
		callback(data);
		
		},
 		error: function(xhr, error){
 	        $("#errorMsg").html(xhr.responseText).show();
 		 }
	});

}
