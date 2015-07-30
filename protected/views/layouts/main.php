<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SeeM - WIL Webapp Project</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/stylish-portfolio.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>
<!-- div for page loading animation -->
<div class="fakeloader"></div>
<!-- -->
<div class="container" id="page">
    <header id="top" class="header">
        <div class="cee">
            <h1>SeeM website!</h1>
        </div>
        <div class="bar">
                <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
                <?php endif?>
        </div>
        <?php echo $content; ?>
    </header>
</div><!-- page -->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/fakeLoader.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom_fakeloader.js"></script>
</body>
</html>
