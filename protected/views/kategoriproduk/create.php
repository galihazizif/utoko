<?php
/* @var $this KategoriprodukController */
/* @var $model Kategoriproduk */

$this->breadcrumbs=array(
	'Kelola Kategori Produk'=>array('admin'),
	'Tambah Kategori Produk',
);

$this->menu=array(
	array('label'=>'Kelola Kategori', 'url'=>array('admin')),
);
?>

<h3>Tambah Kategori Produk</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>