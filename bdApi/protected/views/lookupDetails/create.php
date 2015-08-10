<?php
/* @var $this LookupDetailsController */
/* @var $model LookupDetails */

$this->breadcrumbs=array(
	'Lookup Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LookupDetails', 'url'=>array('index')),
	array('label'=>'Manage LookupDetails', 'url'=>array('admin')),
);
?>

<h1>Create LookupDetails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>