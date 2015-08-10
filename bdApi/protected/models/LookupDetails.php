<?php

/**
 * This is the model class for table "lookup_details".
 *
 * The followings are the available columns in table 'lookup_details':
 * @property string $lookup_value
 * @property integer $lookup_parent_id
 * @property string $lookup_description
 * @property integer $lookup_id
 * @property integer $lookup_type_id
 *
 * The followings are the available model relations:
 * @property DonationRequest[] $donationRequests
 * @property DonationRequest[] $donationRequests1
 * @property DonationRequest[] $donationRequests2
 * @property UserDetails[] $userDetails
 * @property UserDetails[] $userDetails1
 * @property UserDetails[] $userDetails2
 * @property UserDetails[] $userDetails3
 * @property UserDetails[] $userDetails4
 */
class LookupDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LookupDetails the static model class
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
		return 'lookup_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lookup_value, lookup_parent_id, lookup_type_id', 'required'),
			array('lookup_parent_id, lookup_type_id', 'numerical', 'integerOnly'=>true),
			array('lookup_value', 'length', 'max'=>500),
			array('lookup_description', 'length', 'max'=>244),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lookup_value, lookup_parent_id, lookup_description, lookup_id, lookup_type_id', 'safe', 'on'=>'search'),
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
			'donationRequests' => array(self::HAS_MANY, 'DonationRequest', 'area'),
			'donationRequests1' => array(self::HAS_MANY, 'DonationRequest', 'city'),
			'donationRequests2' => array(self::HAS_MANY, 'DonationRequest', 'state'),
			'userDetails' => array(self::HAS_MANY, 'UserDetails', 'area'),
			'userDetails1' => array(self::HAS_MANY, 'UserDetails', 'blood_group'),
			'userDetails2' => array(self::HAS_MANY, 'UserDetails', 'city'),
			'userDetails3' => array(self::HAS_MANY, 'UserDetails', 'state'),
				'userDetails4' => array(self::HAS_MANY, 'UserDetails', 'district'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'lookup_value' => 'Lookup Value',
			'lookup_parent_id' => 'Lookup Parent',
			'lookup_description' => 'Lookup Description',
			'lookup_id' => 'Lookup',
			'lookup_type_id' => 'Lookup Type',
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

		$criteria->compare('lookup_value',$this->lookup_value,true);
		$criteria->compare('lookup_parent_id',$this->lookup_parent_id);
		$criteria->compare('lookup_description',$this->lookup_description,true);
		$criteria->compare('lookup_id',$this->lookup_id);
		$criteria->compare('lookup_type_id',$this->lookup_type_id);

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
	public function suggestLookup($keyword,$lookupType,$limit=20)
	{
		$tags=$this->findAll(array(
				'condition'=>'lookup_value LIKE :keyword and lookup_type_id = :lookup_type_id',
				'limit'=>$limit,
				'params'=>array(
						':keyword'=>'%'.strtr($keyword,array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')).'%',
						':lookup_type_id'=>$lookupType,
				),
		));
		return $tags;
	}
}