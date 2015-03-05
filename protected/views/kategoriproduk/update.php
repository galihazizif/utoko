<?php
/* @var $this KategoriprodukController */
/* @var $model Kategoriproduk */

$this->breadcrumbs=array(
	'Kategoriproduks'=>array('index'),
	$model->katp_id=>array('view','id'=>$model->katp_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kategoriproduk', 'url'=>array('index')),
	array('label'=>'Create Kategoriproduk', 'url'=>array('create')),
	array('label'=>'View Kategoriproduk', 'url'=>array('view', 'id'=>$model->katp_id)),
	array('label'=>'Manage Kategoriproduk', 'url'=>array('admin')),
);
?>

<h1>Update Kategoriproduk <?php echo $model->katp_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>