<?php
class Utilities {
	
	/**
	 *
	 * @return Ambigous <mixed, multitype:unknown mixed , multitype:unknown , string, unknown>
	 */
	static function getLookupTypeList() {
		$lookupList = array ();
		$lookup = Constants::$lookup_type_list;
		for($i = 1; $i <= count ( $lookup ); $i ++) {
			$lookupList [$i] ['lookup_id'] = $i;
			$lookupList [$i] ['lookup_name'] = $lookup [$i];
		}
		return CHtml::listData ( $lookupList, 'lookup_id', 'lookup_name' );
	}
	
	/**
	 *
	 * @return Ambigous <mixed, multitype:unknown mixed , multitype:unknown , string, unknown>
	 */
	static function getStatusList() {
		$statusList = array ();
		$status = Constants::$status_list;
		for($i = 1; $i <= count ( $status ); $i ++) {
			$statusList [$i] ['value'] = $i;
			$statusList [$i] ['label'] = $lookup [$i];
		}
		return CHtml::listData ( $statusList, 'value', 'label' );
	}
	
	/**
	 *
	 * @param unknown $id        	
	 * @return Ambigous <mixed, multitype:unknown mixed , multitype:unknown , string, unknown>
	 */
	static function getLookupListById($id) {
		return CHtml::listData ( EbrLookup::model ()->findAllByAttributes ( array (
				'lookup_number' => $id 
		) ), 'lookup_id', 'lookup_name' );
	}
	static function getLookupListByState() {
		return CHtml::listData ( LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_type_id' => 1 
		) ), 'lookup_id', 'lookup_value' );
	}
	static function getLookupListByCityId($id) {
		return CHtml::listData ( LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_type_id' =>5,
				'lookup_value' =>$id
		) ), 'lookup_id', 'lookup_id' );
	}
	static function getLookupListByStateId($id) {
		return CHtml::listData ( LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_type_id' =>1,
				'lookup_value' =>$id
		) ), 'lookup_id', 'lookup_id' );
	}
	
	static function getLookupListByBloodgroupId($id) {
		return CHtml::listData ( LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_type_id' =>4,
				'lookup_value' =>$id
		) ), 'lookup_id', 'lookup_id' );
	}
	
	/**
	 * 
	 * @param unknown $type_id
	 * @param unknown $value
	 * @return Ambigous <mixed, NULL, unknown, multitype:unknown Ambigous <unknown, NULL> >
	 */
	static function getLookupIdByValue($type_id,$value) {
		$model =  LookupDetails::model ()->findByAttributes ( array (
				'lookup_type_id' =>$type_id,
				'lookup_value' =>$value
		) );
		if(isset($model))
		return $model->lookup_id;
		else
			return "";
	}
	
	static function getLookupListByCityValue($id) {
		return CHtml::listData ( LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_type_id' =>5,
				'lookup_id' =>$id
		) ), 'lookup_id', 'lookup_value' );
	}
	static function getLookupListByBloodgroupValue($id) {
		return CHtml::listData ( LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_type_id' =>4,
				'lookup_id' =>$id
		) ), 'lookup_id', 'lookup_value' );
	}
	static function getLookupListByDistrict($id) {
		return LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_type_id' => 2,
				'lookup_parent_id' => ( int ) $id 
		) );
	}
	static function getLookupListByCity($id) {
		return LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_type_id' => 5,
				'lookup_parent_id' => ( int ) $id 
		) );
	}
	
	static function getLookupListByArea($id) {
		return LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_type_id' => 3,
				'lookup_parent_id' => ( int ) $id 
		) );
	}
	static function getLookupListBybloodGroup() {
		return CHtml::listData ( LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_type_id' => 4 
		) ), 'lookup_id', 'lookup_value' );
	}
	static function getDetails($id) {
		return UserDetails::model ()->findByAttributes ( array (
				'number' => $id 
			
		) );
	}
	static function getDetailswithNo($id) {
		return UserDetails::model ()->findByAttributes ( array (
				'number' => $id ,
			
		) );
	}
	static function getDetailswithPasswordNo($id,$password) {
		return UserDetails::model ()->findByAttributes ( array (
				'number' => $id ,
				'password'=>$password
		) );
	}
	static function getLookupParent($id) {
		return LookupDetails::model ()->findByAttributes ( array (
				'lookup_value' => $id 
		) );
	}
	static function getLookupParentValue($id) {
		return LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_id' =>$id
		));
	}
	static function getLookupType($id) {
		return LookupDetails::model ()->findAllByAttributes ( array (
				'lookup_type_id' => ( int ) $id 
		) );
	}
	static function getState($id) {
		return UserDetails::model ()->findAllByAttributes ( array (
				'state' => ( int ) $id 
		) );
	}
	static function getDistrict($id) {
		return UserDetails::model ()->findAllByAttributes ( array (
				'district' => ( int ) $id 
		) );
	}
	static function getCity($id) {
		return UserDetails::model ()->findAllByAttributes ( array (
				'city' => ( int ) $id 
		) );
	}
	static function getArea($id) {
		return UserDetails::model ()->findAllByAttributes ( array (
				'area' => ( int ) $id 
		) );
	}
	static function getBloodGroup($id) {
		return UserDetails::model ()->findAllByAttributes ( array (
				'blood_group' => ( int ) $id 
		) );
	}
	static function getLookupListByConfirnationcode($user_id) {
		return UserDetails::model ()->findByAttributes ( array (
				'user_id' => ( int ) $user_id 
		) );
	}
	static function getSearch($id) {
		$criteria = new CDbCriteria ();
		$criteria->compare ( 'area', $this->area );
		$criteria->compare ( 'city', $this->city );
		$criteria->compare ( 'state', $this->state );
		$criteria->compare ( 'district', $this->district );
		$criteria->compare ( 'blood_group', $this->blood_group );
		
		return UserDetails::model ()->findAll ( $criteria );
	}
	static function generateRandomString($length = 4) {
		$characters = '0123456789';
		$characters = str_shuffle ( $characters );
		return substr ( $characters, 0, $length );
	}
	
	static function rpHash($value) {
		$hash = 5381;
		$value = strtoupper($value);
		for($i = 0; $i < strlen($value); $i++) {
			$hash = (($hash << 5) + $hash) + ord(substr($value, $i));
		}
		return $hash;
	}
	
	static function getSMSURL($otp, $oldNumber){
		$str = Constants::$otp_message;
		$repstr = strtr($str, array('{$OTP}' => $otp));
		$tempurl = Constants::$sms_url;
		$url1 = strtr($tempurl, array('{$number}' =>  $oldNumber,'{$message}' => $repstr));
		$url2 = preg_replace('/ /', '%20',$url1);
		
		return $url2;
	}
	
	static function getRequestConfirmationSMSURL($number){
		$str =Constants::$req_cnf_message;
		$tempurl =Constants::$sms_url;
		$url1 = strtr($tempurl, array('{$number}' =>  $number,'{$message}' => $str));
		$url2 = preg_replace('/ /', '%20',$url1);
		
		return $url2;
	}
	static function getRequestAdminSMSURL($blood){
		$str = Constants::$admin_req_message;
		
		$number = Constants::$admin_number;
		$tempurl = Constants::$sms_url;
		$repstr = strtr($str, array('{$BLOOD}' => $blood));
		$repstr=urlencode($repstr);
		
		$url1 = strtr($tempurl, array('{$number}' =>  $number,'{$message}' => urlencode($repstr)));
		return $url1;
	}
	
	static function sendBloodRequestSMS($requestId){
		$donationRequest = DonationRequest::model()->findByPk($requestId);
		$users = UserDetails::model ()->findAllByAttributes ( array (
		'blood_group' =>$donationRequest->blood_group,
		'donation_status' =>'Y'
		));
		foreach ( $users as $i => $user ) {
			$str = Constants::$req_user_message;
			$tempurl = Constants::$sms_url;
			$repstr = strtr($str, array('{$GROUP}' => $donationRequest->bloodGroup->lookup_value,'{$ADMIN}' => Constants::$admin_number));
			$url1 = strtr($tempurl, array('{$number}' =>  $user->number,'{$message}' => $repstr));
			$url2=$url2 = preg_replace('/ /', '%20',$url1);
			$payload = file_get_contents ($url2);
		}
	}
	
	static function getPASSWORDURL($otp, $oldNumber){
		$str = Constants::$password_message;
	
	
		$repstr = strtr($str, array('{$OTP}' => $otp));
			
		$tempurl = Constants::$sms_url;
	
		$url1 = strtr($tempurl, array('{$number}' =>  $oldNumber,'{$message}' => $repstr));
		$url2 = preg_replace('/ /', '%20',$url1);
	
		return $url2;
	}
	
	static function rpHash64($value) {
		$hash = 5381;
		$value = strtoupper($value);
		for($i = 0; $i < strlen($value); $i++) {
			$hash = (Utilities::leftShift32($hash, 5) + $hash) + ord(substr($value, $i));
		}
		return $hash;
	}
	
	// Perform a 32bit left shift
	static function leftShift32($number, $steps) {
		// convert to binary (string)
		$binary = decbin($number);
		// left-pad with 0's if necessary
		$binary = str_pad($binary, 32, "0", STR_PAD_LEFT);
		// left shift manually
		$binary = $binary.str_repeat("0", $steps);
		// get the last 32 bits
		$binary = substr($binary, strlen($binary) - 32);
		// if it's a positive number return it
		// otherwise return the 2's complement
		return ($binary{0} == "0" ? bindec($binary) :
		-(pow(2, 31) - bindec(substr($binary, 1))));
	}
	
	static function checkDateFormat($date){
		$dt = DateTime::createFromFormat("Y-m-d", $date);
		return $dt !== false && !array_sum($dt->getLastErrors());
	}
	
	static function getDonorsList($bloodGroup){
		return CHtml::listData ( UserDetails::model()->getActiveDonors(self::getLookupIdByValue(Constants::$bloodgrp_lookup_code, $bloodGroup)), 'user_id', 'name' );
	}
}