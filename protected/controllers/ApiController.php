<?php

class ApiController extends Controller {

    public function filters() {
        return array();
    }

    // Actions
   /*  public function actionList() {
        // get places
        $places = Place::model()->findAll();
        $this->getPlaces($places);
    } */

    /* public function actionView($id) {
        // get places
        $places = Place::model()->findAllByAttributes(array('id' => $id));
        $this->getPlaces($places);
    } */
	//get place that user click from auto complete list
    public function actionSearch($keyword) {
        $keyword = addcslashes($keyword, '%_');
        $q = new CDbCriteria( array(
            'condition' => "name LIKE :keyword",
            'params'    => array(':keyword' => "%$keyword%")
        ) );

        $places = Place::model()->findAll($q);
        $this->getPlaces($places);
    }
	//get place that meet the category
    public function actionType($type){
		if($type=='default'){
			 $places = Place::model()->findAll();
		}else{ 
			$places = Place::model()->findAllByAttributes(array('type' => $type));
		}
        
        $this->getPlaces($places);
    }
	//get auto complete list with include word
    public function actionListName($type, $term) {
        $term = addcslashes($term, '%_');
        $criteria = new CDbCriteria();
        if(strlen($type) == 0) {
            $criteria->condition = "name LIKE :term";
            $criteria->params = array(':term' => "%$term%");
        } else {
            $criteria->condition = "name LIKE :term AND type=:type";
            $criteria->params = array(':term' => "%$term%", ':type' => $type);
        }
        $criteria->select = "name";

        $places = Place::model()->findAll($criteria);
        $names = array();
        foreach($places as $place) {
            $names[] = $place->name;
        }
        echo json_encode($names);
    }
	//encode the place object to json format and response to server
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
	//get comment of any place 
    public function getComments($place_id) {
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
	//encode the comment object to json format and response to server
    public function actionComment() {
        $paramPlaceID = $_POST['place_id'];
        $paramComment = $_POST['comment'];
        $newComment = new Comment();
        $newComment->place_id = $paramPlaceID;
        $newComment->comment_text = $paramComment;

        $arr = array(
            'place_id' => $newComment->place_id,
            'comment_text' => $newComment->comment_text
        );

        if($newComment->save()) {
            echo json_encode($arr);
        }
    }
}