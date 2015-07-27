<?php

class ApiController extends Controller {

    public function filters() {
        return array();
    }

    // Actions
    public function actionList() {
        // get the data
        $models = Place::model()->findAll();
        $rows = array();
        foreach($models as $model) {
            $rows[] = array(
                'id' => $model->id,
                'type' => $model->type,
                'name' => $model->name,
                'detail' => $model->detail,
                'pic' => $model->pic,
            );
        }
        // Send the response
        echo json_encode($rows);
    }
}