<!DOCTYPE html>
<html lang="en">
<head>
<title>Blood Donation App</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.realperson.css"> 
<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css"> 
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.bpopup.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.validate.min.js"></script>

<script type="text/javascript"
src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script src="js/constants.js"></script>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<script src="js/jquery.dataTables.js"></script>

<script src="js/register.js"></script>
<script src="js/request.js"></script>



<script type="text/javascript" src="js/jquery.plugin.js"></script>
<script type="text/javascript" src="js/jquery.realperson.js"></script>
<link rel="stylesheet" href="css/datepicker.css" type="text/css" />
<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />
<link rel="stylesheet" href="css/jquery-ui.structure.css" type="text/css" />
<script type="text/javascript"> 
  var geocoder;
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Geocoder failed");
}

  function initialize() {
    geocoder = new google.maps.Geocoder();



  }

  function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
         //formatted address
        // alert(results[0].formatted_address)
		 var city1=results[0].formatted_address;
		
        //find country name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "locality") {
                    //this is the object you are looking for
                    var city= results[0].address_components[i];
                    document.getElementById("city").value=city.short_name;
                    document.getElementById("regcity").value=city.short_name;
                    
                    break;
                }
                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    var city= results[0].address_components[i];
                    document.getElementById("regstate").value=city.short_name;
                   
                    
                    break;
                }
            }
        }
        //city data
       // alert(city.short_name + " " + address_component.address_components[0].long_name)


        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
    
  }
  </script>
<script>
  jQuery(document).ready(function($) {
	




		if(sessionStorage.getItem("login") === "true"){
			  $("#login").hide();
				$("#register").hide();
				$("#signout").show();
				$("#edit").show();
				
				
			}else{
				$("#signout").hide();
				$("#edit").hide();
				$("#login").show();
				$("#register").show();
			}






		
  $('.captcha').realperson({chars: $.realperson.alphanumeric});
  $("#signout").click(function(event){
		sessionStorage.setItem("login", "null");
		
		 sessionStorage.setItem("loginnumber", "null");
		 window.location="index.php";
	});
 
  });
</script>
</head>

<body onload="initialize()">
	<div class="header-fullwidth">
		<div class="row row-1">
			<div class="container">
				<header class="hbgcolor">
					<div class="clearfix">
						<div class="logo pull-left">
							<img src="images/logo.png" alt="logo" class="responsive" />
						</div>
						<div class="pull-right hrmtop">
							<div class="login-hide">
						
								<a href="#signup-popup" id="register" class="popup-register"><span class="glyphicon glyphicon-user"></span>Become A Donor</a>
								
							</div>
						</div>
					</div>
				</header>
			</div>
		</div>
		</div>

