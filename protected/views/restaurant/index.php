<?php
$this->breadcrumbs=array(
    'Home' => Yii::app()->baseUrl,
    'Restaurant',
);
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
<div class="container">
<div class="contentview">

<h1><center>Top Restaurants in Chiang Mai  <small> powered by <a href="https://foursquare.com/" target="_blank">Foursquare</a></small></h1>
</center>
<ul>

		<?php
foreach ($restaurants->response->groups[0]->items as $restaurant):
	$coordinate = $restaurant->venue->location->lat . "," . $restaurant->venue->location->lng;
	?>
	

<li>
	<a href="https://www.google.co.th/maps/place/<?php echo $coordinate; ?>" target="_blank">
		<?php echo $restaurant->venue->name; ?>
	</a>
</li>
<?php endforeach; ?>
</ul>
</div>
</div>

