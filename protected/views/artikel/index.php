<?php
/* @var $this ArtikelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Artikels',
);

$this->menu=array(
	array('label'=>'Create Artikel', 'url'=>array('create')),
	array('label'=>'Manage Artikel', 'url'=>array('admin')),
);
?>

<h1>Artikels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
