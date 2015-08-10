<?php
/* @var $this DonationRequestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Donation Requests',
);

$this->menu=array(
	array('label'=>'Create DonationRequest', 'url'=>array('create')),
	array('label'=>'Manage DonationRequest', 'url'=>array('admin')),
);
?>

<h1>Donation Requests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
