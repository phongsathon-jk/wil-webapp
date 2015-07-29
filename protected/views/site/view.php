<?php
$place = $places[0];
$this->breadcrumbs=array(
    'Home' => Yii::app()->baseUrl,
    $place->name
);?>

<div class="col-md-8 col-md-offset-2 contentview ">
    <h1 style="text-align: center;"><?php echo $place->name; ?></h1>
    <img class="img-responsive img-rounded img-center" src="<?php echo $place->pic; ?>" alt="<?php echo $place->name; ?>" style="width: 500px; !important;">
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
</div>
