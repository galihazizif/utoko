<?php
/* @var $this ArtikelController */
/* @var $model Artikel */

$this->breadcrumbs=array(
	'Kelola Artikel / Berita'=>array('admin'),
	'Tulis Artikel / Berita',
);

$this->menu=array(
	array('label'=>'Kelola Artikel', 'url'=>array('admin')),
);
?>

<h3>Tambah berita atau artikel</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>