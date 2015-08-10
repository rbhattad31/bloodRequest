$(document).ready(function(){
	
	
	
	
	var oTable = $('#adminjsontable').dataTable();
	$.ajax({
       	type: 'GET',
      		url: url+'/api/userDetails',
			dataType: 'json',
			 
       	success: function(data)
        		{
       		
       		oTable.fnClearTable();
       		for(var i = 0; i < data.length; i++) {
       		oTable.fnAddData([
       		data[i].name,
       		data[i].number,
       		data[i].blood_group,
       		data[i].city,
       		'<button class="adminEdit" id="data[i].user_id">Edit</button>&nbsp;&nbsp;<button class="adminDelete" id="data[i].user_id">Delete</button>',
       		
       		
       		
       		]);} // End Fo
       		
        		},
	});
	
	$("#adminjsontable button.adminEdit").click(function(){
	alert("jwsjw");
	});
	$("#adminForm").validate({
		rules: {
			name: "required",
			number:"required",
			dob:"required",
			password:"required",
			adminpassword: {
				required: true,
				equalTo: '#NNpassword'
				
			},
            city:"required",
			
			admincity: "required",
			state: "required",
			
			
			donation_status : "required",
			blood_group : "required",
			captcha : "required"
		},
		messages: {
			name: "Please enter your Name",
			number:"Please enter your Number",
			dob:"Please enter your DOB",
			password:"Please enter your Password",
			adminpassword: {
				required: "Please enter confirmpassword",
				equalTo:"Please enter same as password"
				
				
			},
			admincity: "Please select City",
			state: "Please select State",
			
			
			blood_group: "Please select Blood Group",
			donation_status: "Please select Donation Status",
			gender: "Please select Gender",
			captcha : "Please enter captcha"
				
		}
	});
	$("#admincity").autocomplete(
		    {
		    minLength: 1,
		    source: function (request, response)
		    {
		    $.ajax(
		    {
		    	 url:url+'/search/city',
		    	 type: "POST",
		        data: {city:$('#admincity').val() },
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
	$("#adminbloodgroup").autocomplete(
		    {
		    minLength: 1,
		    source: function (request, response)
		    {
		    $.ajax(
		    {
		    	 url:url+'/search/bloodgroup',
		    	 type: "POST",
		        data: {bloodgroup:$('#adminbloodgroup').val() },
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
	$("#admincity").blur(function(){	
		 $.ajax({
         	type: 'POST',
         	 url:url+'/search/state1',
				dataType: 'json',
				  data: {value:$('#admincity').val() },
         	success: function(data)
          		{
         		 data.forEach( function (item)
                			{
         			 alert(item.lookup_value);
     				    $("#adminstate").val(item.lookup_value)
     				  });
         		
          		},
          		error: function(xhr, error){
          	        $("#regerrorMsg").html(xhr.responseText).show();
          		 }
				});
		
		
	});
	
	
	$("#UploadButton").click(function () {
		alert("njswndj");
		
		var filename=$("#Uploadfile").val();
		 $.ajax({
         	type: 'POST',
         	 url:url+'/search/excel',
				dataType: 'json',
				enctype: 'multipart/form-data',
				 data: {file:filename},
         	success: function(data)
          		{
         		
         		
          		},
          		error: function(xhr, error){
          			
          		 }
				});
        
    });
	
	$("#adminButton").click(function(){	
		if($("#adminForm").valid()){
		
		
		 validateCaptcha($("#adminCaptcha").val(),$("#adminCaptcha").realperson('getHash'),saveUser);
		// var hash = $("#usrCaptcha").realperson('getHash');
		// var valid = "valid";
		
		}

	
});
function saveUser(valid){
	var state=$('#adminstate').val();
		var status=$('.btn-primary-A .btn-primary ').val();
		var userValues = $("#adminForm").serialize()+'&donation_status='+status+'&state='+state;
		var user = $("#adminForm").serializeArray();
		 if(valid === "Valid"){
			 $.ajax({
	            	type: 'POST',
	           		url: url+'/api/userDetails',
					dataType: 'json',
					 data: userValues,
	            	success: function(data)
                 		{
	            		 $("#adminerrorMsg").hide();
	            		  $("#admincaptchaMsg").hide();
	            		 $("#adminsuccessMsg").html("Successfully Registered").show("show");
	            		
                 		},
                 		error: function(xhr, error){
                 			 $("#admincaptchaMsg").hide();
    	            		 $("#adminsuccessMsg").hide();

                 	        $("#adminerrorMsg").html(xhr.responseText).show();
                 		 }
					});
			 }else{
				 $("#adminsuccessMsg").hide();

      	        $("#adminerrorMsg").hide();
				 $("#admincaptchaMsg").html("Invalid Captcha").show("show");
			}
	}
	
	
	
	
	
	
	
	
	
});