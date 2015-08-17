<?php
/* @var $this UserDetailsController */
/* @var $model UserDetails */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php

$form = $this->beginWidget ( 'CActiveForm', array (
		'action' => Yii::app ()->createUrl ( $this->route ),
		'method' => 'get' 
) );
?>

	
	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'number'); ?>
		<?php echo $form->textField($model,'number',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php
		$this->widget ( 'zii.widgets.jui.CJuiAutoComplete', array (
				'model' => $model,
				'attribute' => 'city',
				'source' => $this->createUrl ( 'site/cities' ),
				'options' => array (
						'showAnim' => 'fold' 
				) 
		) );
		?>
		
		
		
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php
		$this->widget ( 'zii.widgets.jui.CJuiAutoComplete', array (
				'model' => $model,
				'attribute' => 'area',
				'source' => $this->createUrl ( 'site/area' ),
				'options' => array (
						'showAnim' => 'fold' 
				) 
		) );
		?>
		
		
		
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php
		$this->widget ( 'ext.my97DatePicker.JMy97DatePicker', array (
				'name' => CHtml::activeName ( $model, 'dob' ),
				'value' => $model->dob,
				
				'options' => array (
						'dateFmt' => 'yyyy-MM-d' 
				) 
		) );
		?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'blood_group'); ?>
		<?php
		$this->widget ( 'zii.widgets.jui.CJuiAutoComplete', array (
				'model' => $model,
				'attribute' => 'blood_group',
				'source' => $this->createUrl ( 'site/bloodGroups' ),
				'options' => array (
						'showAnim' => 'fold' 
				) 
		) );
		?>
		
	
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->