<?php
/* @var $this LookupDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lookup Details',
);

$this->menu=array(
	array('label'=>'Create LookupDetails', 'url'=>array('create')),
	array('label'=>'Manage LookupDetails', 'url'=>array('admin')),
);
?>

<h1>Lookup Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
