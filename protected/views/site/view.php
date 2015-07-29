<?php
/* @var $this SiteController */

$place = $places[0];

$this->breadcrumbs=array(
    'Home' => Yii::app()->baseUrl,
    $place->name,
);

?>
<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SeeM</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<div class="col-md-8 ">
<h1  ><center><?php echo $place->name; ?></center></h1>
<img class="img-responsive img-rounded img-center" src="<?php //echo $place->pic; ?>" alt="<?php echo $place->name; ?>" style="width: 500px; !important;">
<br>
</div>
<div style ="text-align: center"class ="col-md-7 content">
<p><?php echo $place->detail; ?></center></p><br>
</div>



<br>
<div class="col-md-8">
<h4>Comments</h4>

<ul class="list-group" id="comment_list">
    <?php foreach($place->comments as $comment): ?>
    <li class="list-group-item"><?php echo $comment->comment_text; ?></li>
    <?php endforeach; ?>
</ul>

<input type="hidden" id="place_id" name="place_id" value="<?php echo $place->id; ?>">
<textarea class="form-control" rows="3" name="new_comment" id="new_comment" placeholder="Type your comment here ..." style="width: 40%;"></textarea>
<br>
<button class="btn btn-primary" id="new_comment" type="submit">Commentt</button>
