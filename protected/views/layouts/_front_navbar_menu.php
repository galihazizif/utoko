<?php
	$this->widget('zii.widgets.CMenu',array(
		'items'=>array(
			array('label'=>'Beranda','url'=>array('front/index')),
			array('label'=>'Tentang Kami','url'=>array('front/about')),
			array('label'=>'Login','url'=>array('site/login'),'visible'=> Yii::app()->user->isGuest),
			array('label'=>'Pengaturan','url'=>array('produk/admin'),'visible'=>!Yii::app()->user->isGuest),
			),
		'htmlOptions'=>array('class'=>'nav navbar-nav','id'=>'navbarmenu'),
		));



?>