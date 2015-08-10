<?php
/* @var $this LookupDetailsController */
/* @var $data LookupDetails */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('lookup_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->lookup_id), array('view', 'id'=>$data->lookup_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lookup_value')); ?>:</b>
	<?php echo CHtml::encode($data->lookup_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lookup_parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->lookup_parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lookup_description')); ?>:</b>
	<?php echo CHtml::encode($data->lookup_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lookup_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->lookup_type_id); ?>
	<br />


</div>