<?php
/* @var $this SiteController */

//$this->pageTitle=Yii::app()->name;
?>
<div class="container" style="margin-bottom: 20px;">
	<h1>Attractions in Chiang Mai</h1>
</div>

<div class="row" id="search_option">
	<div class="col-md-6 col-md-offset-3">
		<div class="row">
			<div class="col-md-4" id="dropdown_ajax">
				<select name="type" id="type" class="form-control">
					<option value="">Select category ...</option>
					<option value="temple">Temple</option>
					<option value="natural">Nature</option>
					<option value="culture">Culture</option>
				</select>
			</div>
			<div class="col-md-8" id="autocomplete_ajax">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="keyword" name="search_keyword" id="search_keyword">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="text-align: center;">
				<a href="<?php echo Yii::app()->request->url; ?>restaurant">check-out the restaurants</a>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3" id="twitter">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/twitter_logo.png" alt="" class="img-center" style="width: 50px; !important;">
		<?php foreach ($tweets->statuses as $status): ?>
			<label><?php echo $status->user->name; ?></label>
			<p><?php echo $status->text; ?></p>
		<?php endforeach; ?>
	</div>
	<div class="col-md-7" id="main_content">
		<?php
		foreach($places as $place):
			?>
			<div class="row" id="single_place">
				<div class="col-md-4">
					<a href="<?php echo Yii::app()->request->url; ?>site/view?id=<?php echo $place->id; ?>">
						<img class="img-responsive img-thumbnail" src="<?php echo $place->pic; ?>" alt="<?php echo $place->name; ?>">
					</a>
				</div>
				<div class="col-md-8">
					<a href="<?php echo Yii::app()->request->url; ?>site/view?id=<?php echo $place->id; ?>">
						<label><?php echo $place->name; ?></label>
					</a>
					<p><?php echo $place->detail; ?></p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="col-md-2" id="weather">
		<?php
		$weather = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=chiangmai&units=metric"));
		?>
		<img class="img-center" src="http://openweathermap.org/img/w/<?php echo $weather->weather[0]->icon; ?>.png" alt="<?php echo $weather->weather[0]->main; ?>">
		<p>Condition: <?php echo $weather->weather[0]->main; ?></p>
		<p>Temperature: <?php echo $weather->main->temp; ?> &#8451;</p>
		<p>Min. Temp: <?php echo $weather->main->temp_min; ?> &#8451;</p>
		<p>Max. Temp: <?php echo $weather->main->temp_max; ?> &#8451;</p>
	</div>
</div>
