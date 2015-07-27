<?php

class ApiController extends Controller {

    public function filters() {
        return array();
    }

    // Actions
    public function actionList() {
        // get the data
        $places = Place::model()->findAll();
        $rows = array();
        foreach($places as $place) {
            $rows[] = array(
                'id' => $place->id,
                'type' => $place->type,
                'name' => $place->name,
                'detail' => $place->detail,
                'pic' => $place->pic
            );
        }
        // Send the response
        echo json_encode($rows);
    }

    public function actionSearch($keyword) {
        // get the data
        $keyword = addcslashes($keyword, '%_'); // escape LIKE's special characters
        $q = new CDbCriteria( array(
            'condition' => "name LIKE :keyword",         // no quotes around :match
            'params'    => array(':keyword' => "%$keyword%")  // Aha! Wildcards go here
        ) );

        $places = Place::model()->findAll($q);
        $rows = array();
        foreach($places as $place) {
            $rows[] = array(
                'id' => $place->id,
                'type' => $place->type,
                'name' => $place->name,
                'detail' => $place->detail,
                'pic' => $place->pic,
            );
        }
        // Send the response
        echo json_encode($rows);
    }
}