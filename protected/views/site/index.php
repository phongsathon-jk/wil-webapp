<?php /* @var $this SiteController */ ?>

<div class="center">
	<h2>Attractions in Chiang Mai</h2>
	<br>

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
			<div class="row ">
				<div class="col-md-12" style="text-align: center;">
					<a style="color: white !important;" href="<?php echo Yii::app()->request->url; ?>restaurant">check-out the restaurants</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3 callout" id="twitter" >
			<div class="panel panel-default">
				<div class="panel-heading">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/twitter_logo.png" alt="" class="img-center" style="width: 50px; !important;">
				</div>
				<div class="panel-body">
					<?php foreach ($tweets->statuses as $status): ?>
						<label><?php echo $status->user->name; ?></label>
						<p><?php echo $status->text; ?></p>
						<hr>
					<?php endforeach; ?><br>
				</div>
			</div>
		</div>
		<div class="col-md-7" id="main_content">
			<?php foreach($places as $place): ?>
				<div class="row single_place">
					<div class="col-md-4">
						<a href="<?php echo Yii::app()->request->url; ?>site/view?id=<?php echo $place->id; ?>">
							<img class="img-responsive img-thumbnail" src="<?php echo $place->pic; ?>" alt="<?php echo $place->name; ?>">
						</a>
					</div>
					<div class="col-md-8">
						<a href="<?php echo Yii::app()->request->url; ?>site/view?id=<?php echo $place->id; ?>">
							<label class="place_name"><?php echo $place->name; ?></label>
						</a>
						<p><?php echo $place->detail; ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="col-md-2" id="weather">
			<div class="panel panel-default">
				<div class="panel-heading">
					<img class="img-center" src="http://openweathermap.org/img/w/<?php echo $weather->weather[0]->icon; ?>.png" alt="<?php echo $weather->weather[0]->main; ?>"> WEATHER
				</div>
				<div class="panel-body">
					<span>
						Condition: <?php echo $weather->weather[0]->main; ?><br>
						Temperature: <?php echo $weather->main->temp; ?> &#8451;<br>
						Min. Temp: <?php echo $weather->main->temp_min; ?> &#8451;<br>
						Max. Temp: <?php echo $weather->main->temp_max; ?> &#8451;
					</span>
				</div>
			</div>
		</div>
	</div>
