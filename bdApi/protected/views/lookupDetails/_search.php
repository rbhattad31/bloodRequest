<?php
/* @var $this LookupDetailsController */
/* @var $model LookupDetails */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'lookup_value'); ?>
		<?php echo $form->textField($model,'lookup_value',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lookup_parent_id'); ?>
		<?php echo $form->textField($model,'lookup_parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lookup_description'); ?>
		<?php echo $form->textField($model,'lookup_description',array('size'=>60,'maxlength'=>244)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lookup_id'); ?>
		<?php echo $form->textField($model,'lookup_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lookup_type_id'); ?>
		<?php echo $form->textField($model,'lookup_type_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->