<?php

class ApiController extends Controller {

    public function filters() {
        return array();
    }

    // Actions
    public function actionList() {
        // get places
        $places = Place::model()->findAll();
        $rows = array();
        foreach($places as $place) {
            // get comments
            $comments = Comment::model()->findAllByAttributes(array('place_id' => $place->id));
            $data = array();
            foreach($comments as $comment) {
                $data[] = array(
                    'id' => $comment->id,
                    'place_id' => $comment->place_id,
                    'comment_text' => $comment->comment_text
                );
            }

            $rows[] = array(
                'id' => $place->id,
                'type' => $place->type,
                'name' => $place->name,
                'detail' => $place->detail,
                'pic' => $place->pic,
                'comments' => $data
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
            // get comments
            $comments = Comment::model()->findAllByAttributes(array('place_id' => $place->id));
            $data = array();
            foreach($comments as $comment) {
                $data[] = array(
                    'id' => $comment->id,
                    'place_id' => $comment->place_id,
                    'comment_text' => $comment->comment_text
                );
            }

            $rows[] = array(
                'id' => $place->id,
                'type' => $place->type,
                'name' => $place->name,
                'detail' => $place->detail,
                'pic' => $place->pic,
                'comments' => $data
            );
        }
        // Send the response
        echo json_encode($rows);
    }
}