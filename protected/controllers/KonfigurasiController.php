<?php

class KonfigurasiController extends Controller
{
	

	public $layout = '/layouts/dashboard';
	function actionIndex(){
		$this->render('index');
	}

	function actionWarna(){
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/public/colorpicker/css/bootstrap-colorpicker.min.css','');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/public/colorpicker/js/bootstrap-colorpicker.min.js',CClientScript::POS_END);
		$model = Atribut::model()->findAll();
		$this->render('warna');	
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}