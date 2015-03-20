<?php

class CartController extends Controller
{
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('list','tambah','delete'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('checkout'),
				'expression'=>'$user->isVisitor()',
			),
			array('deny', 
				'actions'=>array('list','tambah','delete','checkout'),
				'expression'=>'$user->isAdmin()',
			),
			array('deny', 
				'users'=>array('*'),
			),
		);
	}
	public function actionCheckout()
	{
		$userId = Yii::app()->user->id['user_id'];
		$modelUser = User::model()->findByPk($userId);

		if(isset($_POST['CheckoutForm'])){
			$modelCheckout = new CheckoutForm;
			$modelCheckout->attributes = $_POST['CheckoutForm'];
			if($modelCheckout->validate()){
				$lokasi = $modelCheckout->kecamatan;
				$alamat = $modelCheckout->alamat;	
			}
			else{
				Yii::app()->user->setFlash('notif','Lokasi harus diisi terlebih dahulu :P');
				$this->render('list');
				exit();
			}
		}else{
			$lokasi = $modelUser->user_lokasi;
			$alamat = $modelUser->user_alamat;
		}

		$count = Keranjang::model()->count('keranjang_sessid = ? AND keranjang_status = ?',array($this->cookieId,Keranjang::STATUS_ADDED));

		if($count < 1){
			Yii::app()->user->setFlash('notif','Tidak ada item didalam keranjang, anda tidak perlu checkout');
			$this->redirect(array('cart/list'));
			exit();
		}

		$kodetrans = date('ymdhis').$userId.substr(microtime(),2,3);
		$tanggal = date('Y-m-d H:i:s');
		$status = Keranjang::STATUS_ADDED;
		$con = Yii::app()->db;
		$trans = $con->beginTransaction();
		try {

			$model = Keranjang::model()->findAll('keranjang_sessid = ? AND keranjang_status = ?',array($this->cookieId,Keranjang::STATUS_ADDED));
			foreach ($model as $key => $value) {
				$kid[] = $value->keranjang_id;
			}

			$qMoveFromCart = 
			"INSERT INTO transaksi(
				trans_kodetrans,
				trans_tanggal,
				trans_produk,
				trans_qty,
				trans_user,
				trans_keterangan,
				trans_lokasi,
				trans_alamat,
				trans_status)
			SELECT 
				'".$kodetrans."',
				'".$tanggal."',
				k.keranjang_produk,
				SUM(k.keranjang_qty),
				".$userId.",
				'',
				".$lokasi.",
				'".$alamat."',
				0 
			FROM keranjang k
			WHERE k.keranjang_sessid = '".$this->cookieId."' AND
			k.keranjang_status = ".$status." 
			GROUP BY (k.keranjang_produk)";

			$command = $con->createCommand($qMoveFromCart);
			
			$command->execute();
							
			$criteria = new CDbCriteria;
			$criteria->addInCondition('keranjang_id',$kid);
			Keranjang::model()->updateAll(array('keranjang_status'=>Keranjang::STATUS_PROCESSED),$criteria);
			

			$mail = new SendMail();
			$mail->destination = array(Yii::app()->params['adminEmail']);
			$mail->subject = $modelUser->user_nama." melakukan pemesanan produk";
			$mail->body = $modelUser->user_nama."&lt;".$modelUser->user_email."&gt;"." &lt;".$modelUser->user_telepon."&gt; ".
							" melakukan pemesanan produk pada toko online anda, silahkan periksa ketersediaan barang. 
							Kemudian segera lakukan konfirmasi kepada pemesan apabila barang tersedia, konfirmasi
							dapat dilakukan melalui tautan ini <a href=\"".$this->createAbsoluteUrl('konfigurasi/transaksi')."\">Klik disini.</a>";
			$mail->kirim();

			$pesan = new Pesan;
			$pesan->pesan_tanggal = $tanggal;
			$pesan->pesan_origination = $userId;
			$pesan->pesan_destination = 0;
			$pesan->pesan_judul = $mail->subject;
			$pesan->pesan_isi = $mail->body;
			$pesan->pesan_status = Pesan::STATUS_NEW;
			if(!$pesan->save()){
				print_r($pesan->errors);
				exit();
			}

			$trans->commit();

			Yii::app()->cache->delete('cart'.$this->cookieId);

		} catch (Exception $e) {
			$trans->rollback();
		}

		Yii::app()->user->setFlash('notif','Chekcout berhasil, kami akan mengirimkan konfirmasi pesanan anda melalui email sesegera mungkin, jika email tidak berada didalam INBOX mungkin berada didalam kotak SPAM.');
		$this->redirect(array('cart/list'));

	}

	public function actionList()
	{
		$form = new CheckoutForm;
		$visitor = null;
		if(Yii::app()->user->isVisitor()){
			$visitor = User::model()->findByPk(Yii::app()->user->id['user_id']);
		}

		$criteria = new CDbCriteria();
		$criteria->with = array('keranjangProduk');
		$criteria->condition = "keranjang_sessid = '".$this->cookieId."' AND keranjang_status = ".Keranjang::STATUS_ADDED;
		$model = Keranjang::model()->findAll($criteria);
		$listKabupaten = ($form->kabupaten != null )? Lokasi::arrayKabupaten($form->provinsi): array(''=>'Pilih Provinsi dulu');
		$listKecamatan = ($form->kecamatan != null )? Lokasi::arrayKecamatan($form->kabupaten): array(''=>'Pilih Kabupaten dulu');
		
		$this->render('list',array(
			'model'=>$model,
			'visitor'=>$visitor,
			'checkoutForm'=>$form,
			'listKabupaten'=>$listKabupaten,
			'listKecamatan'=>$listKecamatan
			)
		);
	}

	public function actionDelete(){
		Yii::app()->cache->delete('cart'.$this->cookieId);
		$model = Keranjang::model()->findByPk($_GET['id']);
		if($model==null)
			throw new CHttpxception(404,"Keranjang tidak ditemukan");
		$model->delete();
		Yii::app()->user->setFlash('notif','Item telah dihapus dari keranjang.');
		$this->redirect($this->createUrl('cart/list'));
			
	}

	public function actionTambah(){
		Yii::app()->cache->delete('cart'.$this->cookieId);
		$produkId 	= (int)$_GET['id'];
		$qty 		= (int)$_GET['qty'];
		$model 		= new Keranjang();
		$model->keranjang_produk 	= $produkId;
		$model->keranjang_qty 		= $qty;
		$model->keranjang_tanggal  	= date('Y-m-d H:i:s');
		$model->keranjang_sessid 	= $this->cookieId;
		$model->save();
		Yii::app()->user->setFlash('notif','produk telah ditambahkan kedalam keranjang.');
		$this->redirect($this->createUrl('cart/list'));
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