<?php

/**
 * This is the model class for table "user_details".
 *
 * The followings are the available columns in table 'user_details':
 * @property integer $user_id
 * @property string $name
 * @property string $number
 * @property integer $city
 * @property integer $state
 * @property string $gender
 * @property string $address
 * @property string $dob
 * @property string $confirmation_code
 * @property string $donation_status
 * @property integer $blood_group
 * @property integer $area
 * @property string $last_donation_date
 *
 * The followings are the available model relations:
 * @property DonationRequest[] $donationRequests
 * @property LookupDetails $city0
 * @property LookupDetails $state0
 * @property LookupDetails $area0
 * @property LookupDetails $bloodGroup
 */
class UserDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, number, city, state, confirmation_code, donation_status, blood_group', 'required'),
			array('city, state, blood_group, area', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('number', 'length', 'max'=>30),
			array('gender, donation_status', 'length', 'max'=>1),
			array('address', 'length', 'max'=>255),
			array('confirmation_code', 'length', 'max'=>20),
			array('dob, last_donation_date', 'safe'),
				array('name, number', 'unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, name, number, city, state, gender, address, dob, confirmation_code, donation_status, blood_group, area, last_donation_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'donationRequests' => array(self::HAS_MANY, 'DonationRequest', 'donor'),
			'city0' => array(self::BELONGS_TO, 'LookupDetails', 'city'),
			'state0' => array(self::BELONGS_TO, 'LookupDetails', 'state'),
			'area0' => array(self::BELONGS_TO, 'LookupDetails', 'area'),
			'bloodGroup' => array(self::BELONGS_TO, 'LookupDetails', 'blood_group'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'name' => 'Name',
			'number' => 'Number',
			'city' => 'City',
			'state' => 'State',
			'gender' => 'Gender',
			'address' => 'Address',
			'dob' => 'Dob',
			'confirmation_code' => 'Confirmation Code',
			'donation_status' => 'Donation Status',
			'blood_group' => 'Blood Group',
			'area' => 'Area',
			'last_donation_date' => 'Last Donation Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		if(isset($this->city))
			$this->city = Utilities::getLookupIdByValue(Constants::$city_lookup_code, $this->city);
		if(isset($this->blood_group))
			$this->blood_group = Utilities::getLookupIdByValue(Constants::$bloodgrp_lookup_code, $this->blood_group);
		if(isset($this->area))
			$this->area = Utilities::getLookupIdByValue(Constants::$area_lookup_code, $this->area);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('city',$this->city);
		$criteria->compare('state',$this->state);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('confirmation_code',$this->confirmation_code,true);
		$criteria->compare('donation_status',$this->donation_status,true);
		$criteria->compare('blood_group',$this->blood_group);
		$criteria->compare('area',$this->area);
		$criteria->compare('last_donation_date',$this->last_donation_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Suggests a list of existing tags matching the specified keyword.
	 * @param string the keyword to be matched
	 * @param integer maximum number of tags to be returned
	 * @return array list of matching tag names
	 */
	public function getActiveDonors($bloodGroup,$limit=20)
	{
		$tags=$this->findAll(array(
				'condition'=>'blood_group = :bloodGroup and donation_status = "Y"',
				'limit'=>$limit,
				'params'=>array(
						':bloodGroup'=>$bloodGroup
				),
		));
		return $tags;
	}
}