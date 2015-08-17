<?php
/* @var $this DonationRequestController */
/* @var $model DonationRequest */

$this->breadcrumbs=array(
	'Donation Requests'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DonationRequest', 'url'=>array('index')),
	array('label'=>'Create DonationRequest', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#donation-request-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Donation Requests</h1>




<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'donation-request-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		array(
				'name'=>'city0.lookup_value',
           		 'header'=>'City',
		),
		'number',
		'date',
		array(
				'name'=>'bloodGroup.lookup_value',
				'header'=>'Blood Group',
		),
		array(
				'name'=>'area0.lookup_value',
				'header'=>'Area',
		),
		'status',
		array(
		'name'=>'donor0.name',
		'header'=>'Donor Name',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
