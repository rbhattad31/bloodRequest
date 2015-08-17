<?php

class DonationRequestController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new DonationRequest;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DonationRequest']))
		{
			$model->attributes=$_POST['DonationRequest'];
			$model->city = Utilities::getLookupIdByValue(Constants::$city_lookup_code, $model->city);
			$model->blood_group = Utilities::getLookupIdByValue(Constants::$bloodgrp_lookup_code, $model->blood_group);
			$model->area = Utilities::getLookupIdByValue(Constants::$area_lookup_code, $model->area);
			$model->state= $model->city0->lookup_parent_id;
			if(!Utilities::checkDateFormat($model->date)){
					$model->date = DateTime::createFromFormat('d/M/yyyy', $model->date )->format('Y-m-d');
				}
			if($model->save())
				$this->redirect(array('view','id'=>$model->request_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DonationRequest']))
		{
			$model->attributes=$_POST['DonationRequest'];
			$model->city = Utilities::getLookupIdByValue(Constants::$city_lookup_code, $model->city);
			$model->blood_group = Utilities::getLookupIdByValue(Constants::$bloodgrp_lookup_code, $model->blood_group);
			$model->area = Utilities::getLookupIdByValue(Constants::$area_lookup_code, $model->area);
			$model->state= $model->city0->lookup_parent_id;
			
			if(!Utilities::checkDateFormat($model->date)){
				$model->date = DateTime::createFromFormat('d/M/yyyy', $model->date )->format('Y-m-d');
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->request_id));
		}
		$model->city = $model->city0->lookup_value;
		$model->area = $model->area0->lookup_value;
		$model->blood_group = $model->bloodGroup->lookup_value;
		//$model->date = DateTime::createFromFormat('Y-m-d', $model->date )->format('d/M/y');
		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('DonationRequest');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DonationRequest('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DonationRequest']))
			$model->attributes=$_GET['DonationRequest'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DonationRequest the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DonationRequest::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DonationRequest $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='donation-request-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
