<?php

class FrontController extends Controller
{

	public function actionCheckout()
	{
		$this->render('checkout');
	}

	public function actionContact()
	{
		$this->render('contact');
	}


	public function actionIndex()
	{

		$criteria = new CDbCriteria();
		$criteria->order = "produk_id DESC";

		if(isset($_GET['q'])){
			$q = trim($_GET['q']);
			$criteria->addSearchCondition('produk_nama',$q);
			if($q == '')
				$criteria->condition = 'produk_nama = \'\'';
		}

		$dataProvider = new CActiveDataProvider('Produk',
			array(
				'pagination'=>array(
					'pageSize'=>6),
				'criteria'=>$criteria,
				)
			);

		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	public function actionKeranjang()
	{
		$this->render('keranjang');
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