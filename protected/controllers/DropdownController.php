<?php

class DropdownController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	
	// Uncomment the following methods and override them if needed
	
	 public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array();
	} 

	public function actionDynamic()
	{
		if($_GET['category_id'] == 0){ 
			$rows = array();
			$places = Place::model()->findAll();
			 foreach($places as $place) {
			$rows[] = array('name'=>$place->name,
							'category'=>0);
			
		   //$rows[] = "ITEM"=>array("place"=>$place->name),"Category"=>array('id'=>$_GET['category_id']);
			}
       
           // foreach ($rows as $value) {
                //echo CHtml::tag('textField', array('value' => 5555,'id'=>'tt'),
                //CHtml::encode('' . ''), true);
            //}
			
			//array_push($rows,$_GET['category_id']);
			
			echo json_encode($rows);
			 
			//echo json_encode($_GET['category_id']);
			//exit();
			//$this->render('index',$rows[]);
			return $_GET['category_id'];
        }
		
		if($_GET['category_id'] == 1){ 
			$rows = array();
			 $places = Place::model()->findAllByAttributes(array('type' => "temple"));
			 foreach($places as $place) {
            $rows[] = $place->name;
			
			}
           
            /* foreach ($rows as $value) {
                echo CHtml::tag('option', array('value' => $value),
                CHtml::encode('' . $value), true);
            } */
			array_push($rows,$_GET['category_id']);
			 		
			echo json_encode($rows);
			//exit();
			//$this->render('index',$rows[]);	
			
        }
       
        if($_GET['category_id'] == 2){
			$rows = array();
			$places = Place::model()->findAllByAttributes(array('type' => 'natural'));
             foreach($places as $place) {
            $rows[] = $place->name;
			}
            
            // foreach ($rows as $value) {
                // echo CHtml::tag('option', array('value' => $value),
                // CHtml::encode('' . $value), true);
            // }
			array_push($rows,$_GET['category_id']);
			echo json_encode($rows);
        }
     
        if($_GET['category_id'] == 3){
			$rows = array();
			 $places = Place::model()->findAllByAttributes(array('type' => 'culture'));
             foreach($places as $place) {
            $rows[] = $place->name;
			}
            
            // foreach ($rows as $value) {
                // echo CHtml::tag('option', array('value' => $value),
                // CHtml::encode('' . $value), true);
            // }
			array_push($rows,$_GET['category_id']);
			echo json_encode($rows);
        }
       
         
        exit();
	}
	
}