<?php
	$this->widget('zii.widgets.CMenu',array(
		'items'=>array(
			array('label'=>'Rangkuman','url'=>array('pengaturan/index')),
			array('label'=>'Inbox','url'=>array('kategoriproduk/admin')),
			array('label'=>'Pemesanan','url'=>array('pengaturan/transaksi')),
			array('label'=>'Logout','url'=>array('site/logout'),'visible'=> !Yii::app()->user->isGuest),
			),
		'htmlOptions'=>array('class'=>'nav nav-sidebar','id'=>'visitorsidebar'),
		));



?>