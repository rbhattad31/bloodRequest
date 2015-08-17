<?php
/* @var $this UserDetailsController */
/* @var $model UserDetails */

$this->breadcrumbs=array(
	'User Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserDetails', 'url'=>array('index')),
	array('label'=>'Create UserDetails', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-details-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Details</h1>




<div class="search-form" style="">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-details-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'number',
		'city0.lookup_value',
		'dob',
		'area0.lookup_value',
		'bloodGroup.lookup_value',
		/*'gender',
		'address',
		'dob',
		'password',
		'confirmation_code',
		'donation_status',
		'blood_group',
		'validate_Status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
