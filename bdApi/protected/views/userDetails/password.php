<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<?php $form=$this->beginWidget('CActiveForm', array(
         'id'=>'email-form',
           'enableClientValidation'=>true,
            ));
 echo "Mobile No";
          echo CHtml::textField('number');
          echo CHtml::submitButton('Send');
          $this->endWidget();
?>
