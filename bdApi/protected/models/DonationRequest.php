<?php

/**
 * This is the model class for table "donation_request".
 *
 * The followings are the available columns in table 'donation_request':
 * @property integer $request_id
 * @property string $name
 * @property integer $city
 * @property integer $state
 * @property string $number
 * @property string $date
 * @property integer $blood_group
 * @property string $confirmatiocode
 * @property string $validatestatus
 * @property integer $area
 *
 * The followings are the available model relations:
 * @property LookupDetails $city0
 * @property LookupDetails $state0
 * @property LookupDetails $area0
 * @property LookupDetails $bloodGroup
 */
class DonationRequest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DonationRequest the static model class
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
		return 'donation_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, city, state, number, date, blood_group, confirmatiocode', 'required'),
			array('city, state, blood_group, area', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('number, confirmatiocode', 'length', 'max'=>10),
			array('validatestatus', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('request_id, name, city, state, number, date, blood_group, confirmatiocode, validatestatus, area', 'safe', 'on'=>'search'),
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
			'request_id' => 'Request',
			'name' => 'Name',
			'city' => 'City',
			'state' => 'State',
			'number' => 'Number',
			'date' => 'Date',
			'blood_group' => 'Blood Group',
			'confirmatiocode' => 'Confirmatiocode',
			'validatestatus' => 'Validatestatus',
			'area' => 'Area',
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

		$criteria->compare('request_id',$this->request_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('city',$this->city);
		$criteria->compare('state',$this->state);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('blood_group',$this->blood_group);
		$criteria->compare('confirmatiocode',$this->confirmatiocode,true);
		$criteria->compare('validatestatus',$this->validatestatus,true);
		$criteria->compare('area',$this->area);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}