$(document).ready(function(){
                                 
	     
   	  $("input[type='radio']").click(function(){
             $(".GenderValidation").hide();
         });
         $(".regreset").click(function(){
       	  $('#userForm').trigger("reset");
       	  $('#userForm').data('validator').resetForm();
         });
         $(".regreset").click(function(){
          	  $('#otp-req').trigger("reset");
          	  //$('#otp-req').data('validator').resetForm();
            });
         
         $('.datepicker').datepicker({
        	 changeMonth: true, changeYear: true,  yearRange: '-120:+100',
             maxDate: new Date(2000, 11,31)
     	});
         
           $("a.popup-register").click(function(){

           	$('#signup-popup').bPopup({
           		 speed: 450,
           	        fadeSpeed: 'slow',
           	        modalColor: '#000',
           	        transitionClose: 'slideDown',
           	        opacity: 0.8,
           	        modalClose: false,
           	        transition: 'slideDown'
                
                       });
           });

	$("#userForm").validate({
		rules: {
			name: "required",
			number:"required",
			dob:"required",
			password:"required",
			confirmPassword: {
				required: true,
				equalTo: '#regpassword'
				
			},

			
			city: "required",
			state: "required",
			area:"required",
			
			gender : "required",
			donation_status : "required",
			blood_group : "required",
			captcha : "required"
		},
		messages: {
			name: "Please enter your Name",
			number:"Please enter your Number",
			dob:"Please enter your DOB",
			password:"Please enter your Password",
			confirmPassword: {
				required: "Please enter confirmpassword",
				equalTo:"Please enter same as password"
				
				
			},
			city: "Please select City",
			state: "Please select State",
			area:"Please select Area",
			
			
			blood_group: "Please select Blood Group",
			donation_status: "Please select Donation Status",
			gender: "Please select Gender",
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
	
	$("#regButton").click(function(){	
		
	
			if($("#userForm").valid()){
			
			 validateCaptcha($("#regCaptcha").val(),$("#regCaptcha").realperson('getHash'),saveUser);
			// var hash = $("#usrCaptcha").realperson('getHash');
			// var valid = "valid";
			
			}
	
		
	});
	
	$("#regbloodgroup").autocomplete(
		    {
		    minLength: 1,
		    source: function (request, response)
		    {
		    $.ajax(
		    {
		    	 url:url+'/search/bloodgroup',
		    	 type: "POST",
		        data: {bloodgroup:$('#regbloodgroup').val() },
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
	$("#regarea").autocomplete(
		    {
		    minLength: 1,
		    source: function (request, response)
		    {
		    $.ajax(
		    {
		    	 url:url+'/search/area',
		    	 type: "POST",
		        data: {area:$('#regarea').val(),city:$('#regcity').val() },
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
	$("#regstate").autocomplete(
		    {
		    minLength: 1,
		    source: function (request, response)
		    {
		    $.ajax(
		    {
		    	 url:url+'/search/state',
		    	 type: "POST",
		        data: {state:$('#regstate').val() },
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
	
	$("#regcity").autocomplete(
		    {
		    minLength: 1,
		    source: function (request, response)
		    {
		    $.ajax(
		    {
		    	 url:url+'/search/city',
		    	 type: "POST",
		        data: {city:$('#regcity').val() },
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
	$("#otpForm").validate({
		rules: {
			otp: "required",
		},
		messages: {
			otp: "Please enter your name"
		}
	});
	$("#otpButton").click(function(){
		$("#invalidOtpMsg").hide();
		otp=$("#regotp").val();
		$(".ajaxload").show();
		$.ajax({
        	type: 'POST',
       		url: url+'/validate/validateotp',
			dataType: 'json',
			 data: {otp:otp,number: userDetails.number},
        	success: function(data)
         		{
        		$(".ajaxload").hide();
        		if(data == "Valid"){
        			window.location="index.php";
					 
					 }else{
						 $("#invalidOtpMsg").toggle("slow"); 
					 }
        		},
         		error: function(xhr, error){
         	        $("#errorMsg").html(xhr.responseText).show();
         		 }
			});
		});
	$("#regcity").blur(function(){	
		 $.ajax({
        	type: 'POST',
        	url:url+'/search/state',
			dataType: 'json',
			data: {value:$('#regcity').val() },
        	success: function(data)
         		{
        		 data.forEach( function (item)
           		{
    			    $("#regstate").val(item.lookup_value)
				  });
        		
         		},
         		error: function(xhr, error){
         	        $("#regerrorMsg").html(xhr.responseText).show();
         		 }
				});
		
		
	});
	function saveUser(valid){
		
		var status=$('.btn-primary-R .btn-primary ').val();
		var userValues = $("#userForm").serialize()+'&donation_status='+status+'&state='+$("#regstate").val();
		var user = $("#userForm").serializeArray();
		 if(valid === "Valid"){
			 $(".ajaxload").show();
			 $.ajax({
	            	type: 'POST',
	           		url: url+'/create/userDetails',
					dataType: 'json',
					 data: user,
	            	success: function(data)
                 		{
	            		$(".ajaxload").hide();
	            		confirmCode = data.confirmation_code;
	            		userDetails = data;
	            		 $('#signup-popup').bPopup().close();
	            		

	                   	$('#otp-req').bPopup({
	                   		 speed: 450,
	                   	        fadeSpeed: 'slow',
	                   	        modalColor: '#000',
	                   	        transitionClose: 'slideDown',
	                   	        opacity: 0.8,
	                   	        modalClose: false,
	                   	        transition: 'slideDown'
	                        
	                               });
	            	
	            		
                 		},
                 		error: function(xhr, error){
                 	        $("#regerrorMsg").html(xhr.responseText).show();
                 		 }
					});
			 }else{
				 $("#regcaptchaMsg").html("Invalid Captcha").show("show");
			}
	}


});