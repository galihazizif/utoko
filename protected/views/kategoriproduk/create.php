<?php
/* @var $this KategoriprodukController */
/* @var $model Kategoriproduk */

$this->breadcrumbs=array(
	'Kategoriproduks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kategoriproduk', 'url'=>array('index')),
	array('label'=>'Manage Kategoriproduk', 'url'=>array('admin')),
);
?>

<h1>Create Kategoriproduk</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>