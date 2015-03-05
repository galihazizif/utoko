<?php
	$this->widget('zii.widgets.CMenu',array(
		'items'=>array(
			array('label'=>'Produk','url'=>array('produk/admin')),
			array('label'=>'Tambah Produk','url'=>array('produk/create')),
			array('label'=>'Kategori Produk','url'=>array('kategoriproduk/admin')),
			array('label'=>'Konfigurasi','url'=>array('konfigurasi/index')),
			array('label'=>'Logout','url'=>array('site/logout'),'visible'=> !Yii::app()->user->isGuest),
			),
		'htmlOptions'=>array('class'=>'nav nav-sidebar','id'=>'dashboardmenu'),
		));



?>