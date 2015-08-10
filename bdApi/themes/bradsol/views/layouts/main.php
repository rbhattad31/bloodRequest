<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bradsol/style.css" media="screen, projection" />
	
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bradsol/bootstrap.min.css" media="screen, projection" />
	
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-latest.min.js" type="text/javascript"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>
	
	
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<header>
    <div class="header-bs">
<div class="logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" alt="logo"></div>
	   <div class="ads">
	   
   <div id='cssmenu' style="margin-top:23px;">
		<ul>
		<li class='active'><a href='<?php echo $this->createUrl('site/index')?>'><span>Home</span></a></li>
	
	<li><a href='<?php echo $this->createUrl('userDetails/create')?>'><span>Create User</span></a></li>
    
  	
  	 <li><a href='<?php echo $this->createUrl('userDetails/admin')?>'><span>Search User</span></a></li>
  	  <li><a href='<?php echo $this->createUrl('userDetails/upload')?>'><span>Add Multiple Users</span></a></li>
     
  	 
	</ul>
	</div>
   
	   </div>
	   <div class="sign_in">
	   
 <?php if(Yii::app()->user->isGuest){?>
<div class="sign-in-absolute">
 
 <p><a href="<?php echo $this->createUrl('site/login')?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/signin.png" /></a></p>
</div>
<?php }else{?>
<div class="roe buttons"> 
<p><a class="logout" href="<?php echo $this->createUrl('site/logout')?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logout.png" /></a></p>    </div>
<div class="logout-not-absolute">
<p>Welcome back <?php echo Yii::app()->user->name ?></p>

</div>
<?php }?>
	   
	   
	  
	    </div>
		<div style="clear:both;"></div>
	</div>
	
   </header>
   
     


<div class="container-fluid">

		
	<div class="col-md-12 body-content">
	<div class="all-pagesBgcolor">
	<?php echo $content; ?>
	</div>
	</div>
	</div>
	<div class="footer">
	<div class="container-fluid">
	<div class="col-md-2 side-menu">
	
	</div>
	<div class="col-md-8 body-content">
	<p style="color:#fff; text-align:center;padding-top:10px;">Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/></p>
		
	</div>
	<div class="col-md-2 right-side-ads">
	
	
	</div>
	</div>
	</div>



</body>
</html>
