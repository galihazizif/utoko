<?php
/* @var $this KategoriprodukController */
/* @var $model Kategoriproduk */

$this->breadcrumbs=array(
	'Kategoriproduks'=>array('index'),
	$model->katp_id,
);

$this->menu=array(
	array('label'=>'List Kategoriproduk', 'url'=>array('index')),
	array('label'=>'Create Kategoriproduk', 'url'=>array('create')),
	array('label'=>'Update Kategoriproduk', 'url'=>array('update', 'id'=>$model->katp_id)),
	array('label'=>'Delete Kategoriproduk', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->katp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kategoriproduk', 'url'=>array('admin')),
);
?>

<h1>View Kategoriproduk #<?php echo $model->katp_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'katp_id',
		'katp_nama',
	),
)); ?>
