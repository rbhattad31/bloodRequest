<?php
/* @var $this LookupDetailsController */
/* @var $model LookupDetails */

$this->breadcrumbs=array(
	'Lookup Details'=>array('index'),
	$model->lookup_id=>array('view','id'=>$model->lookup_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LookupDetails', 'url'=>array('index')),
	array('label'=>'Create LookupDetails', 'url'=>array('create')),
	array('label'=>'View LookupDetails', 'url'=>array('view', 'id'=>$model->lookup_id)),
	array('label'=>'Manage LookupDetails', 'url'=>array('admin')),
);
?>

<h1>Update LookupDetails <?php echo $model->lookup_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>