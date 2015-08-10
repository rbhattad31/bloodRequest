<?php
/* @var $this UserDetailsController */
/* @var $model UserDetails */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-details-form',
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
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'blood_group'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'model' => $model,
		'attribute' => 'blood_group',
		'source'=>$this->createUrl('site/bloodGroups'),
		'options'=>array(
				'showAnim'=>'fold',
		)
	));
		 ?>
		
		<?php echo $form->error($model,'blood_group'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'model' => $model,
		'attribute' => 'city',
		'source'=>$this->createUrl('site/cities'),
		'options'=>array(
				'showAnim'=>'fold',
		)
	));
		 ?>
		
		
		<?php echo $form->error($model,'city'); ?>
	</div>



	
	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php
$this->widget('ext.my97DatePicker.JMy97DatePicker',array(
    'name'=>CHtml::activeName($model,'dob'),
    'value'=>$model->dob,
		
    'options'=>array('dateFmt'=>'d/M/yyyy',),
));
?>
		<?php echo $form->error($model,'dob'); ?>
	</div>
	
<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
	Male:<?php echo $form->radioButton($model, 'gender', array(
    'value'=>'M',
    'uncheckValue'=>null
));
 ?>Female:<?php 
echo $form->radioButton($model, 'gender', array(
    'value'=>'F',
    'uncheckValue'=>null
)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'donation_status'); ?>
	<?php 
		echo $form->dropDownList($model,
                        'donation_status',
                        array('Y'=>'Yes','N'=>'No'),
                        array('empty'=>'Select Status'));
		?>
		<?php echo $form->error($model,'donation_status'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->