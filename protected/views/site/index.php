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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<div class="center">
<h1><center>Attractions in Chiang Mai</center></h1>
<br>
<div class="row" id="search_option">
	<div class="col-md-6 col-md-offset-3">
		<div class="row">
			<div class="col-md-4" id="dropdown_ajax" style="text-align: center;">
				<select name="type" id="type" class="form-control">
					<option value="">Select type ...</option>
					<option value="temple">Temple</option>
					<option value="natural">Nature</option>
					<option value="culture">Culture</option>
				</select>
			</div>
			<div class="col-md-8" id="autocomplete_ajax" style="text-align:right;">
				<div class="form-group">
					<input type="text" class="tb5" placeholder="keyword" name="search_keyword" id="search_keyword">
				</div>
			</div>
		</div>
		<div class="row ">
			<div class="col-md-12 aa" style="text-align: center;">
				<a href="<?php echo Yii::app()->request->url; ?>restaurant">check-out the restaurants</a>
			</div> 
		</div>
	</div>
</div>

<div class="row">

	<div class="col-md-3 callout" id="twitter" >
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/twitter_logo.png" alt="" class="img-center" style="width: 50px; !important;">
		<?php foreach ($tweets->statuses as $status): ?>
		<br>
		<label><?php echo $status->user->name; ?></label>
		<br>
		<?php echo $status->text; ?><br>
		<?php endforeach; ?><br>
	</div>




	<div class="col-md-7" id="main_content">
		<?php
		$places = Place::model()->findAll();
		foreach($places as $place):
			?>
			<div class="row" id="single_place">

				<div class="col-md-4 service-item">
					<a href="<?php echo Yii::app()->request->url; ?>site/view?id=<?php echo $place->id; ?>">
						<img class="img-responsive img-thumbnail" src="<?php echo $place->pic; ?>" alt="<?php echo $place->name; ?>">
					</a>
				</div>
				<div class="col-md-8 content">
					<a href="<?php echo Yii::app()->request->url; ?>site/view?id=<?php echo $place->id; ?>">
						<label><?php echo $place->name; ?></label>
					</a>
					<?php echo $place->detail; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>


	<div class="col-md-2" id="weather">
		
		<?php
		$weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=chiangmai&units=metric"));
		?>
		<div class="col-md-offset-2 we"> 
		<img src="http://openweathermap.org/img/w/<?php echo $weather->weather[0]->icon; ?>.png" alt="<?php echo $weather->weather[0]->main; ?>"> WEATHER
		<div class="we1"><p>Condition:<?php echo $weather->weather[0]->main; ?></p></div>
			<div class="we2"><p>Temperature: <?php echo $weather->main->temp; ?>&#8451;</p></div>
				<div class="we3"><p>Min. Temp: <?php echo $weather->main->temp_min; ?> &#8451;</p></div>
				<div class="we4"><p>Max. Temp: <?php echo $weather->main->temp_max; ?> &#8451;</p>
				</div>
	</div>
</div>
