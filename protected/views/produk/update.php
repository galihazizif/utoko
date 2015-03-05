<?php
/* @var $this ProdukController */
/* @var $model Produk */

$this->breadcrumbs=array(
	'Produks'=>array('index'),
	$model->produk_id=>array('view','id'=>$model->produk_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Produk', 'url'=>array('index')),
	array('label'=>'Create Produk', 'url'=>array('create')),
	array('label'=>'View Produk', 'url'=>array('view', 'id'=>$model->produk_id)),
	array('label'=>'Manage Produk', 'url'=>array('admin')),
);
?>

<h3>Update Produk (<?php echo $model->produk_id; ?>) <?php echo $model->produk_nama;?></h3>

<?php $this->renderPartial('_form', 
	array(
		'model'=>$model,
		'komentarList'=>$komentarList,
		'kategoriProduk'=>$kategoriProduk,
		)); ?>