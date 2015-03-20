<?php

class PesanController extends Controller
{
	public function filters(){
		return array(
			'accessControl',
			);
	}

	public function accessRules()
	{
		return array(
			// array('allow', // allow authenticated user to perform 'create' and 'update' actions
			// 	'actions'=>array('overridestyle'),
			// 	'users'=>array('*'),
			// 	),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('warna',
					'list',
					'detail',
					'create',
					),
				'expression'=>'$user->isAdmin() || $user->isVisitor()',
				),
			array('deny',  // deny all users
				'users'=>array('*'),
				),
			);
	}
	public function actionCreate()
	{
		$this->render('create');
	}

	public function actionDetail()
	{
		$model = Pesan::model()->find('pesan_id = :id AND pesan_destination = :dest',
			array(
				':id'=> $_GET['id'],
				':dest'=> Yii::app()->user->id['user_id'],
				)
			);

		$pesan = array(
			'pesan_id'=>$model->pesan_id,
			'pesan_origination'=>$model->pesanUser->user_nama,
			'pesan_tanggal'=>TextHelper::tanggal($model->pesan_tanggal),
			'pesan_judul'=>$model->pesan_judul,
			'pesan_isi'=>$model->pesan_isi,
			'pesan_status'=>$model->pesan_status,
			);

		$pesan = json_encode($pesan);
		header('Content-type: text/json');
		echo $pesan;
		if($model->pesan_status == Pesan::STATUS_NEW){
			$model->pesan_status = Pesan::STATUS_READ;
			$model->save();
		}
	}

	public function actionList()
	{
		$this->layout = (Yii::app()->user->isAdmin()) ? '/layouts/dashboard': 'layouts/pengaturan';
		$criteria = new CDbCriteria;
		$criteria->condition = "pesan_destination = ".Yii::app()->user->id['user_id'];
		$pesan = Pesan::model()->findAll($criteria);
		$this->render('list',array('pesan'=>$pesan));
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