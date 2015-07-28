<?php

class RestaurantController extends Controller
{
	public function actionIndex()
	{
		$restaurants = json_decode(file_get_contents("https://api.foursquare.com/v2/venues/explore?mode=Food&near=chiangmai&oauth_token=DPP3QQ3LKWOJ5JTA3ST1E2FXN450O5K4QRZ5FPB2O3IDQW15&v=20150724"));

		$this->render('index', array('restaurants' => $restaurants));
	}
}