
<div class="form">
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<form method="post" action="/bloodDonationApp/index.php/userDetails/reset" >
<div class="row">
old password:<input type="password" name="old_password" required/></div>
<div class="row">
newpassword:<input type="password" name="new_password" required/></div>
<div class="row">
repeatpassword<input type="password" name="confirm_password" required/></div>
<div class="row">
<input type="submit" value="send" />
</div>
</form>
</div>