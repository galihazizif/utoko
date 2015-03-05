<?php
/* @var $this ProdukController */
/* @var $model Produk */

$this->breadcrumbs=array(
	'Produks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Produk', 'url'=>array('index')),
	array('label'=>'Create Produk', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#produk-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Kelola Produk</h3>

<p>
Berikut ini daftar produk yang telah dimasukan
</p>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'produk-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
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
		array(
			'name'=>'produk_nama',
			'htmlOptions'=>array('style'=>'width: 250px'),
			),
		array(
			'name'=>'produk_deskripsi',
			'value'=>'$data->deskripsiLimited()',
			'htmlOptions'=>array('style'=>'width: 350px'),
			),
		array(
			'name'=>'produk_kategori',
			'value'=>'$data->produkKategori->katp_nama',
			'htmlOptions'=>array('style'=>'width: 150px'),
			),
		array(
			'name'=>'produk_harga',
			'value'=>'$data->harga()',
			'htmlOptions'=>array('style'=>'width: 120px'),
			),
		/*
		'produk_qty',
		'produk_status',
		'produk_tanggal',
		'produk_allowcomment',
		'produk_img',
		*/
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width: 70px'),
		),
	),
)); ?>
