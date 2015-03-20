<?php

class KonfigurasiController extends Controller
{
	

	public $layout = '/layouts/dashboard';

	public function filters(){
		return array(
			'accessControl',
			);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('overridestyle'),
				'users'=>array('*'),
				),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('warna',
					'index',
					'text',
					'transaksi',
					'transaksidetail',
					'transaksiapprove',
					'transaksibatal',
					'transaksipaymentreceived',
					'editatribut',
					'konfirmasipengiriman',
					'createatribut',
					'deleteatribut'),
				'expression'=>'$user->isAdmin()',
				),
			array('deny',  // deny all users
				'users'=>array('*'),
				),
			);
	}


	function actionIndex(){
		$rekening = Atribut::model()->findAll('atribut_kategori = ?',array(2));
		// Yii::app()->cache->delete('text');
		if(Yii::app()->cache->get('text')===false){
			$textObj = Atribut::model()->findAll('atribut_kategori = ?',array(3));
			foreach($textObj as $row){
				$text[$row->atribut_id] = $row->atribut_isi;
			}
			Yii::app()->cache->set('text',$text,3600*24*30);
		}

		$this->render('index',array(
			'rekening'=>$rekening,
			'text'=>Yii::app()->cache->get('text'),
			));
	}

	function actionEditAtribut(){
		$id = isset($_GET['id'])? $_GET['id'] : '0';
		$atribut = Atribut::model()->findByPk($id);
		if($atribut == null)
			throw new CHttpException(404,"Atribut tidak ditemukan");
		if(isset($_POST['Atribut'])){
			$atribut->atribut_isi = $_POST['Atribut']['atribut_isi'];
			if($atribut->save()){
				Yii::app()->user->setFlash('notifSuccess',$atribut->artribut_deskripsi.' telah disimpan');
				Yii::app()->cache->delete('text');
				$this->redirect(array('konfigurasi/index'));
			}
		}

		$this->render('editatribut',array(
			'model'=>$atribut,
			));
	}

	function actionCreateAtribut(){
		$id = isset($_GET['kategori'])? $_GET['kategori'] : '0';
		$atribut = new Atribut;
		$kategori = Kategoriatribut::model()->findByPk($id);
		if($kategori == null)
			throw new CHttpException(404,"Kategori tidak ditemukan");
		if(isset($_POST['Atribut'])){
			$atribut->attributes = $_POST['Atribut'];
			$atribut->atribut_kategori = $_GET['kategori'];
			if($atribut->save()){
				Yii::app()->user->setFlash('notifSuccess',$atribut->artribut_deskripsi.' telah disimpan');
				$this->redirect(array('konfigurasi/index'));
			}
		}

		$this->render('createatribut',array(
			'model'=>$atribut,
			'kategori'=>$kategori,
			));
	}

	public function actionDeleteAtribut(){
		$id = isset($_GET['id'])? $_GET['id'] : '0';
		$atribut = Atribut::model()->findByPk($id);
		if($atribut->atribut_kategori != 2) // kodeatribut 2 itu bank
			throw new CHttpException(404,"Eits, jangan nakal");

		$atribut->delete();
		Yii::app()->user->setFlash('notifSuccess','Berhasil dihapus');
		$this->redirect(array('konfigurasi/index'));
	}	

	function actionWarna(){
		Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/public/colorpicker/css/bootstrap-colorpicker.min.css','');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/public/colorpicker/js/bootstrap-colorpicker.min.js',CClientScript::POS_END);
		if(isset($_POST['1'])){
			foreach ($_POST as $key => $value) {
				$atribut = Atribut::model()->findByPk($key);
				$atribut->atribut_isi = $value;
				$atribut->save(false);
			}

			if($_POST[Styler::BGTIPE] == 'img'){
				$uploaded = CUploadedFile::getInstanceByName(Styler::BGIMG);
				if($uploaded != null){
					if(($uploaded->extensionName == 'png' || $uploaded->extensionName == 'jpg') && $uploaded->size < 650*1024){
						$uploaded->saveAs('data/static/frontbackground.'.$uploaded->extensionName);
						$atribut = Atribut::model()->findByPk(Styler::BGIMG);
						$atribut->atribut_isi = 'frontbackground.'.$uploaded->extensionName;
						$atribut->save(false);
						Yii::app()->user->setFlash('notifSuccess','Gambar telah disimpan.');
					}
					else
						Yii::app()->user->setFlash('notifError','Something goes wrong.');
				}

				Yii::app()->cache->delete('cssOverride');
				// Yii::app()->cache->delete('cssOverride');
				// Yii::app()->cache->flush();
				
			}

			$this->redirect($this->createUrl('konfigurasi/warna'));		
		}

		Yii::app()->cache->delete('cssOverride');

		$model = Atribut::model()->findAll('atribut_kategori = ?',array(1));
		$this->render('warna',array('model'=>$model));	
	}

	function actionOverrideStyle(){

		if(Yii::app()->cache->get('cssOverride') === false || isset($_GET['nocache'])){
			$model = Atribut::model()->findAll('atribut_kategori = ?',array(1));
			foreach ($model as $key => $value) {
				$cusArray[$value->atribut_id] = $value->atribut_isi; 

			}

			$cssarray = array(
				'.navbar'=>array(
					'background'=>$cusArray[Styler::NAVBAR]),
				'.headerbar'=>array(
					'background'=>$cusArray[Styler::BOXHEADER]),
				'.footer'=>array(
					'border-top'=>'5px solid '.$cusArray[Styler::FOOTERLISTCOLOR]),
				'.well'=>array(
					'background'=>$cusArray[Styler::WELLCOLOR]),
				'.komentar-item'=>array(
					'background'=>$cusArray[Styler::KOMENTARBG]),
				'body'=>array(
					'background'=>($cusArray[Styler::BGTIPE] == 'color')? $cusArray[Styler::BGCOLOR] : 'url(\'../../data/static/'.$cusArray[Styler::BGIMG].'\')',
					'background-repeat'=>$cusArray[Styler::BGIMGREPEAT],
					),
				'#visitorsidebar'=>array(
					'border-right'=>'4px solid'.$cusArray[Styler::FOOTERLISTCOLOR],
					'border-top'=>'4px solid'.$cusArray[Styler::FOOTERLISTCOLOR],
					),
				);

			$st = '';
			foreach ($cssarray as $key => $value) {
				$st .= $key.' { ';
				foreach ($value as $key2 => $value2) {
					$st .= $key2.': '.$value2.'; ';
				}
				$st .= '} ';
			}
			Yii::app()->cache->set('cssOverride',$st,86400);
		}else{
			$st = Yii::app()->cache->get('cssOverride');
		}

		header('Content-type: text/css');
		echo $st;

	}

	public function actionText(){
		
	}

	public function actionTransaksi(){
		$criteria = new CDbCriteria;
		$criteria->group = "trans_kodetrans";
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
		$model = Transaksi::model()->findAll('trans_kodetrans = :kodetrans',array(':kodetrans'=>$idtrans));
		if($model == null)
			throw new CHttpException(404,"Transaksi tidak ditemukan");
			
		$this->render('transaksidetail',
			array(
				'model'=>$model,
				));
	}

	public function actionTransaksiApprove()
	{
		$idtrans = $_GET['kodetrans'];
		$model = Transaksi::model()->findAll('trans_kodetrans = :kodetrans',array(':kodetrans'=>$idtrans));
		if($model == null)
			throw new CHttpException(404,"Transaksi tidak ditemukan");

		if(isset($_POST['Transaksi'])){
			$criteria = new CDbCriteria;
			$criteria->condition = 'trans_kodetrans = \''.$model[0]->trans_kodetrans.'\' AND trans_status ='.Transaksi::STATUS_ADDED;
			$updated = Transaksi::model()->updateAll(array(
				'trans_status'=>Transaksi::STATUS_APPROVED,
				'trans_biaya'=>(int)$_POST['Transaksi']['trans_biayatambahan'],
				),$criteria);
			if($updated > 0){
				Yii::app()->user->setFlash('notifSuccess','Transaksi berhasil diproses');
				$this->redirect(array('konfigurasi/transaksi'));
			}
			else{
				Yii::app()->user->setFlash('notifError','Transaksi GAGAL diproses');
				$this->redirect(array('konfigurasi/transaksi'));
			}
		}
			
		$this->render('transaksiapprove',
			array(
				'model'=>$model,
				));
	}

	public function actionKonfirmasiPengiriman()
	{
		$idtrans = $_GET['kodetrans'];
		$model = Transaksi::model()->findAll('trans_kodetrans = :kodetrans',array(':kodetrans'=>$idtrans));
		if($model == null)
			throw new CHttpException(404,"Transaksi tidak ditemukan");

		if(isset($_POST['Transaksi'])){
			$criteria = new CDbCriteria;
			$criteria->condition = 'trans_kodetrans = \''.$model[0]->trans_kodetrans.'\' AND trans_status ='.Transaksi::STATUS_PAID;
			$updated = Transaksi::model()->updateAll(array(
				'trans_status'=>Transaksi::STATUS_SENT,
				'trans_keterangan'=>$_POST['Transaksi']['trans_keterangan'],
				),$criteria);
			if($updated > 0){
				Yii::app()->user->setFlash('notifSuccess','Status pesanan diubah menjadi SUDAH DIKIRIM');
				$this->redirect(array('konfigurasi/transaksi'));
			}
			else{
				Yii::app()->user->setFlash('notifError','Transaksi GAGAL diproses');
				$this->redirect(array('konfigurasi/transaksi'));
			}
		}
			
		$this->render('konfirmasipengiriman',
			array(
				'model'=>$model,
				));
	}

	public function actionTransaksiBatal()
	{
		$idtrans = $_GET['kodetrans'];
		$model = Transaksi::model()->findAll('trans_kodetrans = :kodetrans AND trans_status = :status',array(':kodetrans'=>$idtrans,':status'=>Transaksi::STATUS_ADDED));
		if($model == null)
			throw new CHttpException(404,"Transaksi tidak ditemukan");

		if(isset($_POST['Transaksi'])){
			$criteria = new CDbCriteria;
			$criteria->condition = 'trans_kodetrans = \''.$model[0]->trans_kodetrans.'\' AND trans_status ='.Transaksi::STATUS_ADDED;
			$updated = Transaksi::model()->updateAll(array(
				'trans_status'=>Transaksi::STATUS_ABORTED,
				'trans_keterangan'=>$_POST['Transaksi']['trans_keterangan'],
				),$criteria);
			if($updated > 0){
				Yii::app()->user->setFlash('notifSuccess','Status pesanan diubah menjadi DIBATALKAN');
				$this->redirect(array('konfigurasi/transaksi'));
			}
			else{
				Yii::app()->user->setFlash('notifError','Transaksi GAGAL diproses');
				$this->redirect(array('konfigurasi/transaksi'));
			}
		}
			
		$this->render('transaksibatal',
			array(
				'model'=>$model,
				));
	}


	public function actionTransaksiPaymentReceived()
	{
		$idtrans = $_GET['kodetrans'];
		$model = Transaksi::model()->findAll('trans_kodetrans = :kodetrans',array(':kodetrans'=>$idtrans));
		if($model == null)
			throw new CHttpException(404,"Transaksi tidak ditemukan");

		 Transaksi::model()->updateAll(array(
				'trans_status'=>Transaksi::STATUS_PAID,
				'trans_keterangan'=>'Pembayaran telah diterima dan pesanan akan segera dikirimkan',
				),'trans_kodetrans = :kode',array('kode'=>$model[0]->trans_kodetrans));
			
		Yii::app()->user->setFlash('notifSuccess','Transaksi telah ditandai sebagai transaksi yang telah dibayar, segera proses barang pesanan dan lakukan konfirmasi setelah barang dikirim agar pemesan tidak menunggu lama.');
		$this->redirect($this->createUrl('konfigurasi/transaksidetail',array('kodetrans'=>$idtrans)));
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