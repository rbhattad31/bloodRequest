<?php
/* @var $this DonationRequestController */
/* @var $model DonationRequest */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'donation-request-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
	<?php echo CHtml::dropDownList('state','',Utilities::getLookupListByState(),
array(
	'empty'=>'select',
    'ajax' => array(
    'type'=>'POST', //request type
    'url'=>CController::createUrl('UserDetails/getCity'), //url to call.
    //Style: CController::createUrl('currentController/methodToCall')
    'update'=>'#city', //selector to update
    //'data'=>'js:javascript statement' 
    //leave out the data key to pass all form values through
))); 
//empty since it will be filled by the other dropdown
?>
	<?php echo $form->error($model,'state'); ?>
	</div>
	<div class="row">
	<?php echo $form->labelEx($model,'city'); ?>
		<?php echo  CHtml::dropDownList('city','',array(),array(
	'empty'=>'select',
    'ajax' => array(
    'type'=>'POST', //request type
    'url'=>CController::createUrl('UserDetails/getArea'), //url to call.
    //Style: CController::createUrl('currentController/methodToCall')
    'update'=>'#area', //selector to update
    //'data'=>'js:javascript statement' 
    //leave out the data key to pass all form values through
))); 
//empty since it will be filled by the other dropdown
?>
		<?php echo $form->error($model,'city'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo  CHtml::dropDownList('area','', array(''=>"please select"));?>
		<?php echo $form->error($model,'area'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number'); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hospital'); ?>
		<?php echo $form->textField($model,'hospital',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'hospital'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php
$this->widget('ext.my97DatePicker.JMy97DatePicker',array(
    'name'=>CHtml::activeName($model,'date'),
    'value'=>$model->date,
		
    'options'=>array('dateFmt'=>'dd-MM-yyyy',),
));
?>
		<?php echo $form->error($model,'date'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->