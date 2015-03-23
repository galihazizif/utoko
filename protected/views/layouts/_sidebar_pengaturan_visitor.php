<?php
	$this->widget('zii.widgets.CMenu',array(
		'items'=>array(
			array('label'=>'<span class="glyphicon glyphicon-stats"></span> Rangkuman','url'=>array('pengaturan/index')),
			array('label'=>'<span class="glyphicon glyphicon-envelope"></span> Inbox','url'=>array('pesan/list')),
			array('label'=>'<span class="glyphicon glyphicon-menu-hamburger"></span>Pemesanan','url'=>array('pengaturan/transaksi')),
			array('label'=>'<span class="glyphicon glyphicon-off"></span> Logout','url'=>array('site/logout'),'visible'=> !Yii::app()->user->isGuest),
			),
		'encodeLabel'=>false,
		'htmlOptions'=>array('class'=>'nav nav-sidebar','id'=>'visitorsidebar'),
		));



?>