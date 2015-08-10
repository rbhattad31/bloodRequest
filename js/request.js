/**
 * 
 */
$(document).ready(function(){
    
	$("#requestForm").validate({
		rules: {
			name: "required",
			number:"required",
			city: "required",
			blood_group : "required",
			captcha : "required"
		},
		messages: {
			name: "Please enter your Name",
			number:"Please enter your Number",
			city: "Please select City",
			blood_group: "Please select Blood Group",
			captcha : "Please enter captcha"
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
		       		$("#errorMsg").html("Blood Request Submitted.").show("slow");
		       		$('#requestForm').trigger("reset");
		       		$('#requestForm').data('validator').resetForm();
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