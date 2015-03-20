<?php
	$this->widget('zii.widgets.CMenu',array(
		'items'=>array(
			array('label'=>'<span class="glyphicon glyphicon-cog"></span> Konfigurasi','url'=>array('konfigurasi/index')),
			array('label'=>'<span class="glyphicon glyphicon-th-list"></span> Kategori Produk','url'=>array('kategoriproduk/admin')),
			array('label'=>'<span class="glyphicon glyphicon-th-large"></span> Produk','url'=>array('produk/admin')),
			array('label'=>'<span class="glyphicon glyphicon-bullhorn"></span> Artikel / Berita','url'=>array('artikel/admin')),
			array('label'=>'<span class="glyphicon glyphicon-euro"></span> Pemesanan','url'=>array('konfigurasi/transaksi')),
			array('label'=>'<span class="glyphicon glyphicon-envelope"></span> Inbox','url'=>array('pesan/list')),
			array('label'=>'<span class="glyphicon glyphicon-off"></span> Logout','url'=>array('site/logout'),'visible'=> !Yii::app()->user->isGuest),
			),
		'encodeLabel'=>false,
		'htmlOptions'=>array('class'=>'nav nav-sidebar','id'=>'dashboardmenu'),
		));



?>