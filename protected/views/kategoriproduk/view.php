<?php
/* @var $this ProdukController */
/* @var $model Produk */

$this->breadcrumbs=array(
	'Kategori Produk'=>array('admin'),
	$model->katp_nama,
);

$this->menu=array(
	array('label'=>'Tambah Kategori', 'url'=>array('create')),
	array('label'=>'Hapus Kategori', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->katp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Kategori', 'url'=>array('admin')),
);
?>

<div class="col-md-6">
<div class="media">
  <div class="media-body">
    <p><?php echo $model->katp_nama;?></p>
    <a class="btn btn-warning btn-sm" href="<?php echo $this->createUrl('kategoriproduk/update',array('id'=>$model->katp_id));?>">Sunting</a>
    <a class="btn delete btn-danger btn-sm" href="<?php echo $this->createUrl('kategoriproduk/delete',array('id'=>$model->katp_id));?>">Hapus</a>
  </div>
</div>
</div>