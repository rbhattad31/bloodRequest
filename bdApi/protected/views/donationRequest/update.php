<?php
/* @var $this DonationRequestController */
/* @var $model DonationRequest */

$this->breadcrumbs=array(
	'Donation Requests'=>array('index'),
	$model->name=>array('view','id'=>$model->request_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DonationRequest', 'url'=>array('index')),
	array('label'=>'Create DonationRequest', 'url'=>array('create')),
	array('label'=>'View DonationRequest', 'url'=>array('view', 'id'=>$model->request_id)),
	array('label'=>'Manage DonationRequest', 'url'=>array('admin')),
);
?>

<h1>Update DonationRequest <?php echo $model->request_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>