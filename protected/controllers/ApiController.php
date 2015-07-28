<?php

class ApiController extends Controller {

    public function filters() {
        return array();
    }

    // Actions
    public function actionList() {
        // get places
        $places = Place::model()->findAll();
        $this->getPlaces($places);
    }

    public function actionView($id) {
        // get places
        $places = Place::model()->findAllByAttributes(array('id' => $id));
        $this->getPlaces($places);
    }

    public function actionSearch($keyword) {
        $keyword = addcslashes($keyword, '%_');
        $q = new CDbCriteria( array(
            'condition' => "name LIKE :keyword",
            'params'    => array(':keyword' => "%$keyword%")
        ) );

        $places = Place::model()->findAll($q);
        $this->getPlaces($places);
    }

    public function actionType($type){
        $places = Place::model()->findAllByAttributes(array('type' => $type));
        $this->getPlaces($places);
    }

    public function actionListName($term) {
        $term = addcslashes($term, '%_');
        $q = new CDbCriteria( array(
            'condition' => "name LIKE :term",
            'params'    => array(':term' => "%$term%")
        ) );

        $places = Place::model()->findAll($q);
        $names = array();
        foreach($places as $place) {
            $names[] = $place->name;
        }
        echo json_encode($names);

    }

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