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
		<?php echo $form->labelEx($model,'area'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'model' => $model,
		'attribute' => 'area',
		'source'=>$this->createUrl('site/area'),
		'options'=>array(
				'showAnim'=>'fold',
		)
	));
		 ?>
		<?php echo $form->error($model,'area'); ?>
	</div>
	
	

	<div class="row">
		<?php echo $form->labelEx($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php
		$this->widget ( 'ext.my97DatePicker.JMy97DatePicker', array (
				'name' => CHtml::activeName ( $model, 'date' ),
				'value' => $model->date,
				
				'options' => array (
						'dateFmt' => 'yyyy-MM-d' 
				) 
		) );
		?>
		<?php echo $form->error($model,'date'); ?>
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
		<?php echo $form->labelEx($model,'donor'); ?>
		<?php 
		echo $form->dropDownList($model,
                        'status',
                      Utilities::getDonorsList($model->blood_group),
                        array('empty'=>'Select Donor'));
		?>
		
		<?php echo $form->error($model,'donor'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php 
		echo $form->dropDownList($model,
                        'status',
                       Constants::$request_status_list,
                        array('empty'=>'Select Status of Request'));
		?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->