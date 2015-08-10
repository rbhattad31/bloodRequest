<?php
/* @var $this LookupDetailsController */
/* @var $model LookupDetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lookup-details-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lookup_value'); ?>
		<?php echo $form->textField($model,'lookup_value',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'lookup_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lookup_parent_id'); ?>
		<?php echo $form->textField($model,'lookup_parent_id'); ?>
		<?php echo $form->error($model,'lookup_parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lookup_description'); ?>
		<?php echo $form->textField($model,'lookup_description',array('size'=>60,'maxlength'=>244)); ?>
		<?php echo $form->error($model,'lookup_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lookup_type_id'); ?>
		<?php echo CHtml::dropDownList('state','',Utilities::getLookupTypeList(), array('empty'=>'Select')); ?>
		<?php echo $form->error($model,'lookup_type_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->