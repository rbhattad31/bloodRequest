<?php
/* @var $this DonationRequestController */
/* @var $model DonationRequest */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
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
		
	</div>

	
<div class="row">
		<?php echo $form->label($model,'area'); ?>
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
	</div>
	<div class="row">
		<?php echo $form->label($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	
	<div class="row">
		<?php echo $form->label($model,'blood_group'); ?>
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
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'donor'); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'model' => $model,
		'attribute' => 'donor',
		'source'=>$this->createUrl('site/donors'),
		'options'=>array(
				'showAnim'=>'fold',
		)
	));
		 ?>
		
		<?php echo $form->error($model,'donor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php 
		echo $form->dropDownList($model,
                        'status',
                       Constants::$request_status_list,
                        array('empty'=>'Select Status of Request'));
		?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->