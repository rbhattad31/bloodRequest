<?php
class UserDetailsController extends Controller {
	/**
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 *      using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/main';
	
	/**
	 *
	 * @return array action filters
	 */
	public function filters() {
		return array (
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete'  // we only allow deletion via POST request
				);
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 *
	 * @return array access control rules
	 */
	public function accessRules() {
		return array (
				array (
						'allow', // allow all users to perform 'index' and 'view' actions
						'actions' => array (
								'index',
								'view',
								'suggestName' 
						)
						,
						'users' => array (
								'*' 
						) 
				),
				array (
						'allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions' => array (
								'create',
								'update' 
						),
						'users' => array (
								'@' 
						) 
				),
				array (
						'allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions' => array (
								'admin',
								'delete',
								'upload' 
						)
						,
						'users' => array (
								'admin' 
						) 
				),
				array (
						'deny', // deny all users
						'users' => array (
								'*' 
						) 
				) 
		);
	}
	
	/**
	 * Displays a particular model.
	 *
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 */
	public function actionSuggestName($term) {
		// the $term parameter is what the user typed in on the control
		
		// send back an array of data:
		echo CJSON::encode ( array (
				'one',
				'two',
				'three' 
		) );
		
		Yii::app ()->end ();
	}
	public function actionView($id) {
		$this->render ( 'view', array (
				'model' => $this->loadModel ( $id ) 
		) );
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpload() {
		$model = new UserDetails ();
		$donors = array ();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['UserDetails'] )) {
			$model->attributes = $_POST ['UserDetails'];
			
			// $donors = array ();
			$uploadedFile = CUploadedFile::getInstance ( $model, 'donorFile' );
			if (empty ( $uploadedFile )) {
				Yii::app ()->user->setFlash ( 'error', "Please Select File" );
			} else {
				$fileName = str_replace ( ' ', '', $uploadedFile->name );
				
				$images_path = realpath ( Yii::app ()->basePath . '/../files' );
				$uploadedFile->saveAs ( $images_path . '/' . $fileName );
				$path = $images_path . '\\' . $fileName;
				Yii::import ( 'ext.vendors.PHPExcel', true );
				$extension = end ( explode ( '.', $fileName ) );
				if ($extension == 'xls' || $extension == 'xlsx') {
					
					switch ($extension) {
						case 'xls' :
							$objReader = PHPExcel_IOFactory::createReader ( 'Excel5' );
							break;
						case 'xlsx' :
							$objReader = PHPExcel_IOFactory::createReader ( 'Excel2007' );
							break;
					}
					
					$objPHPExcel = $objReader->load ( $path ); // $file --> your filepath and filename
					$coloumn = $objPHPExcel->setActiveSheetIndex ( 0 )->getHighestColumn ();
					$highestColumnIndex = PHPExcel_Cell::columnIndexFromString ( $coloumn );
					$objWorksheet = $objPHPExcel->getActiveSheet ();
					$i = 0;
					foreach ( $objWorksheet->getRowIterator () as $key1 => $row ) {
						if ($key1 == 1)
							continue;
						$cellIterator = $row->getCellIterator ();
						$tempModel = new UserDetails ();
						
						foreach ( $cellIterator as $key => $cell ) {
							if (is_null ( $cell ))
								continue;
							switch ($key) {
								case 0 :
									$tempModel->name = $cell->getCalculatedValue ();
									break;
								case 1 :
									$tempModel->number = $cell->getCalculatedValue ();
									break;
								case 2 :
									$tempModel->city = Utilities::getLookupIdByValue ( Constants::$city_lookup_code, $cell->getCalculatedValue () );
									break;
								case 3 :
									$tempModel->area = Utilities::getLookupIdByValue ( Constants::$area_lookup_code, $cell->getCalculatedValue () );
									break;
								case 4 :
									$tempModel->gender = $cell->getCalculatedValue ();
									break;
								case 5 :
									$tempModel->donation_status = $cell->getCalculatedValue ();
									break;
								case 6 :
									$tempModel->dob = $cell->getCalculatedValue ();
									break;
								case 7 :
									$tempModel->blood_group = Utilities::getLookupIdByValue ( Constants::$bloodgrp_lookup_code, $cell->getCalculatedValue () );
									break;
								case 8 :
									$tempModel->address = $cell->getCalculatedValue ();
									break;
								default :
									break;
							}
						}
						$donors [$i] = $tempModel;
						
						$i ++;
					}
					
					$valid = false;
					
					foreach ( $donors as $i => $donor ) {
						if (! empty ( $donor->city )) {
							$donor->state = $donor->city0->lookup_parent_id;
						}
						if (! empty ( $donor->dob )) {
							$donor->dob = DateTime::createFromFormat ( 'd/m/Y', $donor->dob )->format ( 'Y-m-d' );
						}
						if ($donor->validate ()) {
							$valid = true;
						}
					}
					if ($valid) {
						foreach ( $donors as $i => $donor ) {
							
							$donor->save ( false );
							Yii::app ()->user->setFlash ( 'success', "The Donors Are Uploaded Successfully" );
						}
					}
					foreach ( $donors as $i => $donor ) {
						$donor->blood_group = $donor->bloodGroup->lookup_value;
					
						if (! empty ( $donor->city )) {
							$donor->state = $donor->state0->lookup_value;
							$donor->city = $donor->city0->lookup_value;
						}
						if (! empty ( $donor->area )) {
							$donor->area = $donor->area0->lookup_value;
						}
					}
				} else {
					Yii::app ()->user->setFlash ( 'error', "Please Select File xls,xlsx Only" );
				}
			}
		}
		
		$this->render ( 'upload', array (
				'model' => $model,
				'donors' => $donors 
		) );
	}
	public function actionCreate() {
		$model = new UserDetails ();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['UserDetails'] )) {
			
			$model->attributes = $_POST ['UserDetails'];
			
			$model->city = Utilities::getLookupIdByValue ( Constants::$city_lookup_code, $model->city );
			$model->blood_group = Utilities::getLookupIdByValue ( Constants::$bloodgrp_lookup_code, $model->blood_group );
			
			$model->confirmation_code = "0000";
			$model->area = Utilities::getLookupIdByValue ( Constants::$area_lookup_code, $model->area );
			if (isset ( $model->city ) && $model->city != "")
			$model->state = $model->city0->lookup_parent_id;
			if(!Utilities::checkDateFormat($model->dob)){
			if (isset ($model->dob ) && $model->dob != "")
				$model->dob = DateTime::createFromFormat('d/M/yyyy', $model->dob )->format('Y-m-d');
			}
			//$model->dob = DateTime::createFromFormat ( 'd/m/Y', $model->dob )->format ( 'Y-m-d' );

			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->user_id 
				));
		}
		
		if(!empty($model->city))
		$model->city = $model->city0->lookup_value;
		if(!empty($model->blood_group))
		$model->blood_group = $model->bloodGroup->lookup_value;
		if(!empty($model->area))
		$model->area = $model->area0->lookup_value;
	
		$this->render ( 'create', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *        	the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel ( $id );
		//$model->dob = DateTime::createFromFormat ( 'Y-m-d', $model->dob )->format ( 'd/m/Y' );
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['UserDetails'] )) {
			$model->attributes = $_POST ['UserDetails'];
			
			$model->city = Utilities::getLookupIdByValue ( Constants::$city_lookup_code, $model->city );
			$model->blood_group = Utilities::getLookupIdByValue ( Constants::$bloodgrp_lookup_code, $model->blood_group );
			$model->state = $model->city0->lookup_parent_id;
			$model->area = Utilities::getLookupIdByValue ( Constants::$area_lookup_code, $model->area );
			if(!Utilities::checkDateFormat($model->dob)){
				$model->dob = DateTime::createFromFormat('d/M/yyyy', $model->dob )->format('Y-m-d');
			}
			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->user_id 
				) );
		}
		if(isset($model->city))
		$model->city = $model->city0->lookup_value;
		if(isset($model->blood_group))
		$model->blood_group = $model->bloodGroup->lookup_value;
		if(isset($model->area))
		$model->area = $model->area0->lookup_value;
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 *
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this->loadModel ( $id )->delete ();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (! isset ( $_GET ['ajax'] ))
			$this->redirect ( isset ( $_POST ['returnUrl'] ) ? $_POST ['returnUrl'] : array (
					'admin' 
			) );
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider ( 'UserDetails' );
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new UserDetails ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['UserDetails'] ))
			$model->attributes = $_GET ['UserDetails'];
// 		$model->city = Utilities::getLookupIdByValue ( Constants::$city_lookup_code, $model->city );
// 		$model->blood_group = Utilities::getLookupIdByValue ( Constants::$bloodgrp_lookup_code, $model->blood_group );
// 		$model->area = Utilities::getLookupIdByValue ( Constants::$area_lookup_code, $model->area );
// 		$model->dob = DateTime::createFromFormat ( 'd/m/Y', $model->dob )->format ( 'Y-m-d' );
		
		$this->render ( 'admin', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 *
	 * @param integer $id
	 *        	the ID of the model to be loaded
	 * @return UserDetails the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = UserDetails::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 *
	 * @param UserDetails $model
	 *        	the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'user-details-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}
