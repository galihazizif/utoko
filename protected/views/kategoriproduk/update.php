<?php
/* @var $this KategoriprodukController */
/* @var $model Kategoriproduk */

$this->breadcrumbs=array(
	'Kelola Kategori Produk'=>array('admin'),
	$model->katp_nama=>array('view','id'=>$model->katp_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Kelola Kategori Produk', 'url'=>array('admin')),
);
?>

<h3>Ubah <?php echo $model->katp_nama; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>