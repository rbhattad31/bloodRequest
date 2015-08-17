<?php
/* @var $this DonationRequestController */
/* @var $model DonationRequest */

$this->breadcrumbs=array(
	'Donation Requests'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List DonationRequest', 'url'=>array('index')),
	array('label'=>'Create DonationRequest', 'url'=>array('create')),
	array('label'=>'Update DonationRequest', 'url'=>array('update', 'id'=>$model->request_id)),
	array('label'=>'Delete DonationRequest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->request_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DonationRequest', 'url'=>array('admin')),
);
?>

<h1>View DonationRequest #<?php echo $model->request_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		array(
				'label'=>'City',
				'value'=>null===$model->city0->lookup_value?
				"custom message":
				$model->city0->lookup_value,
		),
		'number',
		'date',
		array(
				'label'=>'Blood Group',
				'value'=>null===$model->bloodGroup->lookup_value?
				"custom message":
				$model->bloodGroup->lookup_value,
		),
		array(
				'label'=>'Area',
				'value'=>null===$model->area0->lookup_value?
				"custom message":
				$model->area0->lookup_value,
		),
		'status',
		'remarks',
	),
)); ?>
