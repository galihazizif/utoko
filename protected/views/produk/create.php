<?php
/* @var $this ProdukController */
/* @var $model Produk */

$this->breadcrumbs=array(
	'Kelola Produk'=>array('admin'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Kelola Produk', 'url'=>array('admin')),
);
?>

<h3>Tambahkan Produk</h3>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'komentarList'=>$komentarList,
	'kategoriProduk'=>$kategoriProduk,
	)); ?>