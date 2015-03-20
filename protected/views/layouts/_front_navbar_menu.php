<?php
	$this->widget('zii.widgets.CMenu',array(
		'items'=>array(
			array('label'=>'Beranda','url'=>array('front/index')),
			array('label'=>'Login','url'=>array('site/login'),'visible'=> Yii::app()->user->isGuest),
			array('label'=>'Pengaturan','url'=>array('pengaturan/index'),'visible'=>Yii::app()->user->isVisitor()),
			array('label'=>'Pengaturan','url'=>array('konfigurasi/index'),'visible'=>Yii::app()->user->isAdmin()),
			array('label'=>'Logout','url'=>array('site/logout'),'visible'=> !Yii::app()->user->isGuest),
			),
		'htmlOptions'=>array('class'=>'nav navbar-nav','id'=>'navbarmenu'),
		));



?>