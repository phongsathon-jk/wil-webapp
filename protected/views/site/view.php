<?php
/* @var $this SiteController */

$place = $places[0];

$this->breadcrumbs=array(
    'Home' => Yii::app()->baseUrl,
    $place->name,
);

?>

<h1><?php echo $place->name; ?></h1>
<img class="img-responsive img-rounded img-center" src="<?php //echo $place->pic; ?>" alt="<?php echo $place->name; ?>" style="width: 500px; !important;">
<br>
<p><?php echo $place->detail; ?></p><br>

<h4>Comments</h4>
<ul class="list-group">
    <?php foreach($place->comments as $comment): ?>
    <li class="list-group-item"><?php echo $comment->comment_text; ?></li>
    <?php endforeach; ?>
</ul>
