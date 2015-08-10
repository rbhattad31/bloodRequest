<?php
include 'header.php';
?>

<div class="min-height-all-page">


<script>
	var data ='';
	var confirmCode;
	var forgotpassword="";
	var userDetails = "";
	$.validator.addMethod("custom_number", function(value, element) {
	    return this.optional(element) || value === "NA" ||
	        value.match(/[789][0-9]{9}/);
	}, "Please enter a valid number, or 'NA'");
$(document).ready(function(){
	var oTable = $('#jsontable').dataTable();
	
	<!-- edit popup start here -->

$("a.user-edit-account").click(function(){

	$('#editprofile-popup').bPopup({
        speed: 450,
        fadeSpeed: 'slow',
        modalColor: '#000',
        transitionClose: 'slideBack',
        opacity: 0.8,
        modalClose: false,
        transition: 'slideDown'
	});
});
<!-- edit popup end here  -->
$("a.loginform").click(function(){

	$('.loginform-dsplay').bPopup({
        speed: 450,
        fadeSpeed: 'slow',
        modalColor: '#000',
        transitionClose: 'slideBack',
        opacity: 0.8,
        modalClose: false,
        transition: 'slideDown'
     
            });
});


$("#table").hide();

});

</script>

<?php include 'bloodRequest.php';?>


<!-- edit profile for Admin start here -->

</div>
<!-- edit Admin profile end here -->
<?php include 'registerForm.php';?>
<script>

$('.btn-toggle').click(function() {
    $(this).find('.btn').toggleClass('active');  
    
    if ($(this).find('.btn-primary').size()>0) {
    	$(this).find('.btn').toggleClass('btn-primary');
    }
    if ($(this).find('.btn-danger').size()>0) {
    	$(this).find('.btn').toggleClass('btn-danger');
    }
    if ($(this).find('.btn-success').size()>0) {
    	$(this).find('.btn').toggleClass('btn-success');
    }
    if ($(this).find('.btn-info').size()>0) {
    	$(this).find('.btn').toggleClass('btn-info');
    }
    
    $(this).find('.btn').toggleClass('btn-default');
       
});
</script>
<?php
include 'footer.php';
?>
