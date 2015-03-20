<?php

class ProdukController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/dashboard';

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0x11111E,
				'foreColor'=>0xFFFFFF,
				'offset'=>0,
				'testLimit'=>1,
			),
		);
	}

	/**
	 * @return array action filters
	 */
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('detail','captcha'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','detail','view'),
				'expression'=>'$user->isAdmin()',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'expression'=>'$user->isAdmin()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Produk;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Produk']))
		{
			$model->attributes=$_POST['Produk'];
			$uploaded = CUploadedFile::getInstance($model,'produk_img');
			$model->produk_tanggal = date('Y-m-d H:i:s');
			if($model->save()){
				if($uploaded != null){
					$uploaded->saveAs('data/images/'.$model->produk_id.'.'.$uploaded->extensionName);
					$model->produk_img = $model->produk_id.'.'.$uploaded->extensionName;
					$model->save();
					Yii::app()->user->setFlash('notifSuccess','Produk telah disimpan');
				}

				$this->redirect(array('view','id'=>$model->produk_id));
			}
		}

		$objKategoriProduk = Kategoriproduk::model()->findAll();
		foreach ($objKategoriProduk as $value) {
			$kategoriProduk[$value->katp_id] = $value->katp_nama;
		}

		$this->render('create',array(
			'model'=>$model,
			'komentarList'=>Produk::commentAllowanceList(),
			'kategoriProduk'=>$kategoriProduk,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Produk']))
		{
			$model->attributes=$_POST['Produk'];
			$prevImg = $model->produk_img;
			$uploaded = CUploadedFile::getInstance($model,'produk_img');
			if($model->save()){
				if($uploaded != null){
					$uploaded->saveAs('data/images/'.$model->produk_id.'.'.$uploaded->extensionName);
					$model->produk_img = $model->produk_id.'.'.$uploaded->extensionName;
					$model->save();
					Yii::app()->user->setFlash('notifSuccess','Produk berhasil diubah');
				}
				else{
					$model->produk_img = $prevImg;
					$model->save();
					Yii::app()->user->setFlash('notifSuccess','Produk berhasil diubah');
				}

				$this->redirect(array('view','id'=>$model->produk_id));
			}
		}

		$objKategoriProduk = Kategoriproduk::model()->findAll();
		foreach ($objKategoriProduk as $value) {
			$kategoriProduk[$value->katp_id] = $value->katp_nama;
		}

		$this->render('update',array(
			'model'=>$model,
			'komentarList'=>Produk::commentAllowanceList(),
			'kategoriProduk'=>$kategoriProduk,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		Yii::app()->user->setFlash('notifSuccess','Produk #'.$id.' berhasil dihapus');

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Produk');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Produk('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Produk']))
			$model->attributes=$_GET['Produk'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Produk the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Produk::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Produk $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='produk-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionDetail(){
		if(!isset($_GET['id']))
			throw new CHttpException(404,"Error Processing Request");
			
		$this->layout = '/layouts/detail';
		$komentar = new Komentar;
		$criteria = new CDbCriteria();
		$jmlKomentar = Komentar::model()->count($criteria);
		$pagination = new CPagination($jmlKomentar);
		$pagination->pageSize = 5;
		$pagination->applyLimit($criteria);
		$komentarExist = Komentar::model()->findAll($criteria);
		$model = Produk::model()->findByPk((int)$_GET['id']);
		if($model == null){
			throw new CHttpException(404,"Produk tidak ditemukan");
			exit();
		}

		if(isset($_POST['Komentar'])){
			$komentar->attributes = $_POST['Komentar'];
			$komentar->komentar_prod_id = $model->produk_id;
			$komentar->komentar_tanggal = date('Y-m-d H:i:s');
			$komentar->komentar_pengirim = -99;
			if($komentar->save()){
				$this->redirect($this->createUrl('produk/detail',array('id'=>$model->produk_id)));
			}
		}
			
		$this->render('detail',array(
			'model'=>$model,
			'komentar'=>$komentar,
			'komentarExist'=>$komentarExist,
			'pagination'=>$pagination,
			));
	}
}
