<?php
/* @var $this ArtikelController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = "".Yii::app()->name;
$this->breadcrumbs=array(
	'Artikels',
);

$this->menu=array(
	array('label'=>'Create Artikel', 'url'=>array('create')),
	array('label'=>'Manage Artikel', 'url'=>array('admin')),
);
?>

<div class="well" style="min-height: 400px">
	<h3><?php echo $model->artikel_judul;?></h3>
	<p><?php echo $model->artikel_isi;?></p>

</div>


