<?php
/* @var $this LookupDetailsController */
/* @var $model LookupDetails */

$this->breadcrumbs=array(
	'Lookup Details'=>array('index'),
	$model->lookup_id,
);

$this->menu=array(
	array('label'=>'List LookupDetails', 'url'=>array('index')),
	array('label'=>'Create LookupDetails', 'url'=>array('create')),
	array('label'=>'Update LookupDetails', 'url'=>array('update', 'id'=>$model->lookup_id)),
	array('label'=>'Delete LookupDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->lookup_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LookupDetails', 'url'=>array('admin')),
);
?>

<h1>View LookupDetails #<?php echo $model->lookup_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'lookup_value',
		'lookup_parent_id',
		'lookup_description',
		'lookup_id',
		'lookup_type_id',
	),
)); ?>
