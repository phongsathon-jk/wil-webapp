 <div class="col-md-6 col-md-offset-3">
    <?php
$place = $places[0];
$this->breadcrumbs=array(
'Home' => Yii::app()->baseUrl,$place->name,);?>
    <?php
    $this->pageTitle=Yii::app()->name;
    ?>
</div>
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

    <div class="col-md-8 col-md-offset-2 contentview ">
        <a href="<?php echo Yii::app()->request->baseUrl; ?>">HOME PAGE</a>
        <h1 style="text-align: center;"><?php echo $place->name; ?></h1>
        <center><img class="img-responsive img-rounded img-center" src="<?php echo $place->pic; ?>" alt="<?php echo $place->name; ?>" style="width: 500px; !important;"></center>
        <br>
        <p><?php echo $place->detail; ?></p><br>
        <div class="col-md-8 contentview2">

            <h4 style =" font-size: 22px; font-color: #580000;">Comments</h4>

            <ul class="list-group" id="comment_list">
                <?php foreach($place->comments as $comment): ?>
                <li class="list-group-item"><?php echo $comment->comment_text; ?></li>
            <?php endforeach; ?>
        </ul>

        <input type="hidden" id="place_id" name="place_id" value="<?php echo $place->id; ?>">
        <textarea class="form-control" rows="3" name="new_comment" id="new_comment" placeholder="Type your comment here ..." style="width: 40%;"></textarea>
        <br>
        <button class="btn btn-primary" id="new_comment" type="submit">Comment</button>
    </div>
