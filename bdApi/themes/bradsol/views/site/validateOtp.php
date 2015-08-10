
<div class="form">
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<form method="post" action="/bloodDonationApp/index.php/site/validateOtp" >
<div class="row">
otp:<input type="text" name="otp" required/></div>

<input type="submit" value="send" />

</form>
</div>