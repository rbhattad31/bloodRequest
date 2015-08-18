/**
 * 
 */
$(document).ready(function(){
	
	var date = new Date();
	var currentMonth = date.getMonth();
	var currentDate = date.getDate();
	var currentYear = date.getFullYear();
	$('#datepickerreq').datepicker({
		changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        changeMonth: true, changeYear: true,  yearRange: '-100:+100',
        
	minDate: new Date(currentYear, currentMonth, currentDate)
	});
   
	
	$.validator.addMethod("dateFormat",
		    function(value, element) {
		        return value.match(/^dd?-dd?-dd$/);
		    },
		    "Please enter a date in the format dd-mm-yyyy.");
	
	$("#requestForm").validate({
		rules: {
			name: "required",
			number:"required",
			city: "required",
			blood_group : "required",
			captcha : "required",
			area:"required",
			date : {"required":true}
		},
		messages: {
			name: "Please enter your Name",
			number:"Please enter your Number",
			city: "Please select City",
			blood_group: "Please select Blood Group",
			captcha : "Please enter captcha",
			area:"Please enter Area",
			date : "Please select date of requirement"
			},
		errorPlacement: function(error, element) {
			        if ( element.is(":radio") ) {
			            error.prependTo(".gender-error-msg");
			        }
			        else { // This is the default behavior of the script for all fields
			            error.insertAfter( element );
			        }
			    }
	});

	$("#area").autocomplete(
		    {
		    minLength: 1,
		    source: function (request, response)
		    {
		    $.ajax(
		    {
		    	 url:url+'/search/area',
		    	 type: "POST",
		        data: {area:$('#area').val(),city:$('#city').val() },
		        dataType: "json",
		        success: function (jsonDataReceivedFromServer)
		        {
		        //alert (JSON.stringify (jsonDataReceivedFromServer));
		        // console.log (jsonDataReceivedFromServer);
		        response ($.map(jsonDataReceivedFromServer, function (item)
		            {
		            console.log (item.firstname);
		                            // NOTE: BRACKET START IN THE SAME LINE AS RETURN IN 
		                            //       THE FOLLOWING LINE
		            return {
		                id: item.lookup_value, value: item.lookup_value };
		            }));
		        }
		      });
		     },
		   });
$("#bloodgroup").autocomplete(
	    {
	    minLength: 1,
	    source: function (request, response)
	    {
	    $.ajax(
	    {
	    	 url:url+'/search/bloodgroup',
	    	 type: "POST",
	        data: {bloodgroup:$('#bloodgroup').val() },
	        dataType: "json",
	        success: function (jsonDataReceivedFromServer)
	        {
	        //alert (JSON.stringify (jsonDataReceivedFromServer));
	        // console.log (jsonDataReceivedFromServer);
	        response ($.map(jsonDataReceivedFromServer, function (item)
	            {
	            console.log (item.firstname);
	                            // NOTE: BRACKET START IN THE SAME LINE AS RETURN IN 
	                            //       THE FOLLOWING LINE
	            return {
	                id: item.lookup_value, value: item.lookup_value };
	            }));
	        }
	      });
	     },
	   });
$("#city").autocomplete(
	    {
	    minLength: 1,
	    source: function (request, response)
	    {
	    $.ajax(
	    {
	    	 url:url+'/search/city',
	    	 type: "POST",
	        data: {city:$('#city').val() },
	        dataType: "json",
	        success: function (jsonDataReceivedFromServer)
	        {
	        //alert (JSON.stringify (jsonDataReceivedFromServer));
	        // console.log (jsonDataReceivedFromServer);
	        response ($.map(jsonDataReceivedFromServer, function (item)
	            {
	            console.log (item.firstname);
	                            // NOTE: BRACKET START IN THE SAME LINE AS RETURN IN 
	                            //       THE FOLLOWING LINE
	            return {
	                id: item.lookup_value, value: item.lookup_value };
	            }));
	        }
	      });
	     },
	   });


$("#reqBtn").click(function(){	
	 
	if($("#requestForm").valid()){
		
		 validateCaptcha($("#reqCaptcha").val(),$("#reqCaptcha").realperson('getHash'),createRequest);
		 
		
	}
			
});

function createRequest(valid){
	
	if(valid === "Valid"){
		$("#captchaMsg").html("").hide();
		$("#errorMsg").html("").hide();
		var reqDetails = $("#requestForm").serialize();
		 
		 var request = $("#requestForm").serializeArray();
		 $.ajax({
	       	type: 'POST',
      		url: url+'/create/donationRequest',
			dataType: 'json',
			 data: request,
	       	success: function(data)
	        		{
		       		
		       		$('#requestForm').trigger("reset");
		       		$('#requestForm').data('validator').resetForm();
		       		alert("Blood request submitted. You would be contacted by administrator.");
	        		},
	        		error: function(xhr, error){
	        	        $("#errorMsg").html(xhr.responseText).show();
	        		 }
				});
		
	}else{
		 $("#captchaMsg").html("Invalid Captcha").show("show");
	}
	
}

});