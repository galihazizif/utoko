<?php

class PengaturanController extends Controller
{
	public $layout = '/layouts/pengaturan';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			// 'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(
					'transaksi',
					'index',
					'transaksidetail',
					'konfirmasipembayaran'),
				'expression'=>'$user->isVisitor()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex()
	{
		$model = User::model()->findByPk(Yii::app()->user->id['user_id']);
		$this->render('index',array(
			'model'=>$model,
			)
		);
	}

	public function actionKonfirmasiPembayaran()
	{
		$kodetrans = isset($_GET['kodetrans'])? trim($_GET['kodetrans']): 0;
		$transaksi = Transaksi::model()->findAll('trans_kodetrans = :kodetrans AND trans_status = :status',
			array(
				':kodetrans'=>$kodetrans,
				':status'=>Transaksi::STATUS_APPROVED,
				));
		if($transaksi == null)
			throw new CHttpException(404,"Transaksi tidak ditemukan");


		$model = new KonfirmasiPembayaranForm;

		$daftarRekening = Atribut::model()->findAll('atribut_kategori = 2');
		foreach ($daftarRekening as $value) {
			$rekening[$value->atribut_id] = $value->atribut_isi;
		}
			
		if(isset($_POST['KonfirmasiPembayaranForm'])){
			$model->attributes = $_POST['KonfirmasiPembayaranForm'];
			if($model->validate()){
				Transaksi::model()->updateAll(array(
					'trans_status'=>Transaksi::STATUS_PAYMENT_CONFIRMED,
					'trans_keterangan'=>$model->tanggal.' Tujuan pembayaran '.$rekening[$model->norektujuan].', pengirim '.$model->namarekasal.' ('.$model->norekasal.') Rp.'.$model->nominal,
					),'trans_kodetrans = ? AND trans_status = ?',
					array($transaksi[0]->trans_kodetrans,Transaksi::STATUS_APPROVED));
				Yii::app()->user->setFlash('notif','Konfirmasi pembayaran telah dikirim');
				$this->redirect($this->createUrl('pengaturan/transaksidetail',array('kodetrans'=>$transaksi[0]->trans_kodetrans)));
			}
		}


		$this->render('konfirmasipembayaran',array(
			'model'=>$model,
			'transaksi'=>$transaksi[0],
			'rekening'=>($daftarRekening != null)?$rekening:array(null,'Belum Ada Rekening'),
			));
	}

	public function actionTransaksi()
	{
		$criteria = new CDbCriteria;
		$criteria->group = "trans_kodetrans";
		$criteria->order ="trans_tanggal DESC";
		

		$criteria = new CDbCriteria;
		$criteria->group = "trans_kodetrans";
		$criteria->condition = "trans_user = ".Yii::app()->user->id['user_id'];
		$criteria->order ="trans_status,trans_tanggal DESC";
		if(isset($_GET['q']))
			$criteria->addSearchCondition('trans_kodetrans',trim($_GET['q']));

		$count = Transaksi::model()->count($criteria);
		$pagination = new CPagination($count);
		$pagination->pageSize = 10;
		$pagination->applyLimit($criteria);
		$model = Transaksi::model()->findAll($criteria);
		$this->render('transaksi',
			array(
				'model'=>$model,
				'pagination'=>$pagination,
				));
	}

	public function actionTransaksiDetail()
	{
		$idtrans = $_GET['kodetrans'];
		$userid = Yii::app()->user->id['user_id'];
		$model = Transaksi::model()->findAll('trans_user = :user AND trans_kodetrans = :kodetrans',array(':user'=>$userid,':kodetrans'=>$idtrans));
		$user = User::model()->findByPk($userid);
		if($model == null)
			throw new CHttpException(404,"Transaksi tidak ditemukan");
			
		$this->render('transaksidetail',
			array(
				'model'=>$model,
				'user'=>$user,
				));
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