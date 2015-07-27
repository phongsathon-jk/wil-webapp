<?php

class ApiController extends Controller {
    private $format = 'json';

    public function filters() {
        return array();
    }

    // Actions
    public function actionList() {
        // Get the respective model instance
        switch($_GET['model'])
        {
            case 'places':
                $models = Places::model()->findAll();
                break;
            default:
                // Model not implemented error
                $this->_sendResponse(501, sprintf(
                    'Error: Mode <b>list</b> is not implemented for model <b>%s</b>',
                    $_GET['model']) );
                Yii::app()->end();
        }
    }

}