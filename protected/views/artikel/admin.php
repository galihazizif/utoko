<?php
/* @var $this ArtikelController */
/* @var $model Artikel */

$this->breadcrumbs=array(
	'Kelola Artikel / Berita',
);

$this->menu=array(
	array('label'=>'Tambah Artikel', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#artikel-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Kelola Artikel / Berita</h3>

<p>
Berita / artikel dapat meningkatkan peluang ditemukannya toko online anda oleh mesin pencari.
</p>


<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'artikel-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'htmlOptions'=>array('class'=>''),
	'itemsCssClass'=>'table table-bordered table-condensed table-hover',
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
			'name'=>'artikel_judul',
			'htmlOptions'=>array('style'=>'width: 300px'),
			),
		array(
			'name'=>'artikel_isi',
			'value'=>'$data->previewIsi(150)',
			'htmlOptions'=>array('style'=>'width: 370px'),
			),
		array(
			'name'=>'artikel_tanggal',
			'value'=>'TextHelper::tanggal($data->artikel_tanggal)',
			'htmlOptions'=>array('style'=>'width: 150px'),
			),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('style'=>'width: 70px'),
		),
	),
)); ?>
