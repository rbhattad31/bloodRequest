<?php
/* @var $this EmpRegistrationController */
/* @var $model EmpRegistration */
/* @var $form CActiveForm */
?>
<html>
<head>


</head>
</html>
<div class="form bg-color-upload">
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'emp-registration-form',
        'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		
	<div class="row">
		
		<?php echo $form->fileField($model, 'donorFile'); ?> 
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<a href="<?php echo Yii::app()->request->baseUrl; ?>/img/Donors.xlsx">Sample Donors File</a>
		
	</div>
<?php if(count($donors) > 0){?>	
<table>
<tr>
<th></th>
<th><?php echo $form->labelEx($model,'name'); ?></th>
<th><?php echo $form->labelEx($model,'number'); ?></th>
<th><?php echo $form->labelEx($model,'blood_group'); ?></th>
<th><?php echo $form->labelEx($model,'city'); ?></th>
<th><?php echo $form->labelEx($model,'gender'); ?></th>
<th><?php echo $form->labelEx($model,'dontion_status'); ?></th>
<th><?php echo $form->labelEx($model,'address'); ?></th>
<th><?php echo $form->labelEx($model,'dob'); ?></th>
</tr>
<?php foreach($donors as $i=>$donor): ?>
<tr class="row">
<td>
<?php echo $donor->name.'</br>' ?>
<?php echo $form->error($donor,'name'); ?>
</td>
<td>
<?php echo $donor->number.'</br>' ?>
<?php echo $form->error($donor,'number'); ?>
</td>
<td>
<?php echo $donor->blood_group.'</br>' ?>
<?php echo $form->error($donor,'blood_group'); ?>
</td>
<td>
<?php echo $donor->city.'</br>' ?>
<?php echo $form->error($donor,'city'); ?>
</td>
<td>
<?php echo $donor->gender.'</br>' ?>
<?php echo $form->error($donor,'gender'); ?>
</td>
<td>
<?php echo $donor->donation_status.'</br>' ?>
<?php echo $form->error($donor,'donation_status'); ?>
</td>
<td>
<?php echo $donor->address.'</br>' ?>
<?php echo $form->error($donor,'address'); ?>
</td>
<td>
<?php echo $donor->dob.'</br>' ?>
<?php echo $form->error($donor,'dob'); ?>
</td>
</tr>
<?php endforeach; ?>
</table>
 

	<?php }?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->