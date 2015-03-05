<?php
/* @var $this ProdukController */
/* @var $model Produk */

$this->breadcrumbs=array(
	'Produks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Produk', 'url'=>array('index')),
	array('label'=>'Manage Produk', 'url'=>array('admin')),
);
?>

<h3>Tambahkan Produk</h3>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'komentarList'=>$komentarList,
	'kategoriProduk'=>$kategoriProduk,
	)); ?>