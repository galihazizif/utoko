<?php

class LokasiController extends Controller
{
	public function actionUpdateKabupaten()
	{
		$param = $_GET[key($_GET)]['provinsi'];
		$model = Lokasi::arrayKabupaten($param);
		foreach ($model as $key => $value) {
			echo '<option value="'.$key.'">'.$value.'</option>';
		}
	}

	public function actionUpdateKecamatan()
	{
		$param = $_GET[key($_GET)]['kabupaten'];
		$model = Lokasi::arrayKecamatan($param);
		foreach ($model as $key => $value) {
			echo '<option value="'.$key.'">'.$value.'</option>';
		}
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