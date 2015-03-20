<?php
/* @var $this KategoriprodukController */
/* @var $model Kategoriproduk */

$this->breadcrumbs=array(
	'Kelola Kategori Produk',
);

$this->menu=array(
	array('label'=>'Tambah Kategori', 'url'=>array('create')),
);
?>

<h3>Kelola Kategori Produk</h3>

<p>
Daftar kategori produk digunakan untuk mengkategorikan daftar produk yang ada.
</p>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'kategoriproduk-grid',
	'dataProvider'=>$model->search(),
	'htmlOptions'=>array('class'=>''),
	'itemsCssClass'=>'table table-bordered table-condensed table-hover sidemenu',
	'summaryCssClass'=>'',
	'enablePagination'=>true,
	'pager'=>array(
				'class'=>'CLinkPager',
				'header'=>' ',
				'firstPageCssClass'=>'',
				'nextPageLabel'=>'>',
				'prevPageLabel'=>'<',
				'firstPageLabel'=>'<<',
				'lastPageLabel'=>'>>',
				'hiddenPageCssClass'=>'disabled',
				'selectedPageCssClass'=>'active',
				'htmlOptions'=>array('class'=>'pagination'),
				),
	'pagerCssClass'=>'',
	'columns'=>array(
		'katp_nama',
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width: 70px'),
		),
	),
)); ?>
