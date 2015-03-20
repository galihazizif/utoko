<?php
/* @var $this ArtikelController */
/* @var $model Artikel */

$this->breadcrumbs=array(
	'Artikels'=>array('index'),
	$model->artikel_id=>array('view','id'=>$model->artikel_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Artikel', 'url'=>array('index')),
	array('label'=>'Create Artikel', 'url'=>array('create')),
	array('label'=>'View Artikel', 'url'=>array('view', 'id'=>$model->artikel_id)),
	array('label'=>'Manage Artikel', 'url'=>array('admin')),
);
?>

<h1>Update Artikel <?php echo $model->artikel_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>