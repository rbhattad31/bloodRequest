<?php
/* @var $this DonationRequestController */
/* @var $model DonationRequest */

$this->breadcrumbs=array(
	'Donation Requests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DonationRequest', 'url'=>array('index')),
	array('label'=>'Manage DonationRequest', 'url'=>array('admin')),
);
?>

<h1>Create DonationRequest</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>