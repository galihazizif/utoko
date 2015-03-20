<?php
/* @var $this ArtikelController */
/* @var $model Artikel */

$this->breadcrumbs=array(
	'Artikels'=>array('index'),
	$model->artikel_id,
);

$this->menu=array(
	array('label'=>'List Artikel', 'url'=>array('index')),
	array('label'=>'Create Artikel', 'url'=>array('create')),
	array('label'=>'Update Artikel', 'url'=>array('update', 'id'=>$model->artikel_id)),
	array('label'=>'Delete Artikel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->artikel_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Artikel', 'url'=>array('admin')),
);
?>
<hr>
<div class="col-md-6">
<div class="media">
  <div class="media-body">
    <h4 class="media-heading">
    <?php echo $model->artikel_judul;?>
    </h4>
    <p><?php echo $model->artikel_isi;?></p>
	<p>Di tambahkan pada <strong><?php echo TextHelper::tanggal($model->artikel_tanggal);?></strong> <br>
    <hr>
    <a class="btn btn-warning btn-sm" href="<?php echo $this->createUrl('artikel/update',array('id'=>$model->artikel_id));?>">Sunting</a>
    <a class="btn btn-danger btn-sm" href="<?php echo $this->createUrl('artikel/delete',array('id'=>$model->artikel_id));?>">Hapus</a>
  </div>
</div>
</div>