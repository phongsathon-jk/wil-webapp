<?php

// provided api
class ApiController extends Controller {

    public function filters() {
        return array();
    }

    /*
        provided api actions
    */

    // list all places
    public function actionList() {
        // get places
        $places = Place::model()->findAll();
        $this->getPlaces($places);
    }

    // view a place
    public function actionView($id) {     //require param id
        // get places
        $places = Place::model()->findAllByAttributes(array('id' => $id));
        $this->getPlaces($places);
    }

    // list places with matched keyword in their name
    public function actionSearch($keyword) {
        $keyword = addcslashes($keyword, '%_');

        // set-up search query
        $q = new CDbCriteria( array(
            'condition' => "name LIKE :keyword",                // use name LIKE
            'params'    => array(':keyword' => "%$keyword%")    // refer to received param keyword
        ) );

        // begin querying
        $places = Place::model()->findAll($q);
        $this->getPlaces($places);
    }

    // get places in a type
    public function actionType($type){
        // query with a received param 'type'
        $places = Place::model()->findAllByAttributes(array('type' => $type));
        $this->getPlaces($places);
    }

    // get only place name, for auto-complete
    public function actionListName($type, $term) {
        $term = addcslashes($term, '%_');
        $criteria = new CDbCriteria();
        if(strlen($type) == 0) {
            // if not select a type, create criteria with only name LIKE
            $criteria->condition = "name LIKE :term";
            $criteria->params = array(':term' => "%$term%");
        } else {
            // if select a type, create criteria with name LIK and the selected type
            $criteria->condition = "name LIKE :term AND type=:type";
            $criteria->params = array(':term' => "%$term%", ':type' => $type);
        }
        // get only 'name' from table
        $criteria->select = "name";

        $places = Place::model()->findAll($criteria);
        $names = array();
        foreach($places as $place) {
            $names[] = $place->name;
        }
        echo json_encode($names);
    }

    // add a new comment
    public function actionComment() {
        // retrieve place id from request
        $paramPlaceID = $_POST['place_id'];
        // retrieve text from request
        $paramComment = $_POST['comment'];

        // create new comment object
        $newComment = new Comment();
        $newComment->place_id = $paramPlaceID;
        $newComment->comment_text = $paramComment;

        $arr = array(
            'place_id' => $newComment->place_id,
            'comment_text' => $newComment->comment_text
        );

        // if save successfully, response in json
        if($newComment->save()) {
            echo json_encode($arr);
        }
    }

    // common function to organise the place array into json
    public function getPlaces($places){
        $rows = array();
        foreach($places as $place) {
            $rows[] = array(
                'id' => $place->id,
                'type' => $place->type,
                'name' => $place->name,
                'detail' => $place->detail,
                'pic' => $place->pic,
                'comments' => $this->getComments($place->id)
            );
        }
        // Send the response
        echo json_encode($rows);
    }

    // retrieve the comments of a places
    public function getComments($place_id) {        // require place id
        // find places with place id
        $comments = Comment::model()->findAllByAttributes(array('place_id' => $place_id));
        $data = array();
        foreach($comments as $comment) {
            $data[] = array(
                'id' => $comment->id,
                'place_id' => $comment->place_id,
                'comment_text' => $comment->comment_text
            );
        }
        return $data;
    }
}