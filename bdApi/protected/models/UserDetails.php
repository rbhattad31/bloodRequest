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
 *
 * The followings are the available model relations:
 * @property LookupDetails $city0
 * @property LookupDetails $state0
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
			array('name, number, city, state, donation_status, blood_group', 'required'),
			array('city, state, blood_group', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('number', 'length', 'max'=>10),
			array('number', 'unique'),
			array('gender, donation_status', 'length', 'max'=>1),
			array('address', 'length', 'max'=>255),
			array('confirmation_code', 'length', 'max'=>20),
			array('dob', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, name, number, city, state, gender, address, donation_status, blood_group', 'safe', 'on'=>'search'),
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
			'city0' => array(self::BELONGS_TO, 'LookupDetails', 'city'),
			'state0' => array(self::BELONGS_TO, 'LookupDetails', 'state'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}