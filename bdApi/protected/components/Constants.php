<?php
class Constants{
    static $admin_number=9966866886;
	static $state_lookup_code = 1;
	static $district_lookup_code = 2;
	static $area_lookup_code = 3;
	static $bloodgrp_lookup_code = 4;
	static $city_lookup_code = 5;
	static $status_list = array('Y'=>'Yes','N'=>'No');
	static $lookup_type_list = array('1'=>'State','2'=>'District', '3'=>'Area','4'=>'Blood Group','5'=>'City');
	static $request_status_list = array('Requested'=>'Requested','In Process'=>'In Process','Donor Assigned'=>'Donor Assigned','FullFilled'=>'FullFilled','Other'=>'Other');
	static $role_list = array('1'=>'admin','2'=>'general');
	static $otp_message = 'Welcome to Mahesh Foundation Your OTP is {$OTP}';
	static $req_user_message = 'We have recieved a blood request for {$GROUP}. Please contact {$ADMIN} if willing to donate.';
	static $req_cnf_message = 'Your Blood Request has been submitted. Admin would contact you with further details.';
	static $password_message = 'Your Password is {$OTP}';
	static $sms_url = 'http://reseller.bulksmshyderabad.co.in/api/smsapi.aspx?username=abhibhattad&password=BRAD&to={$number}&from=BHATTD&message={$message}';
}