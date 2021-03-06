<?php
/* @var $this ProdukController */
/* @var $model Produk */

$this->breadcrumbs=array(
	'Produk'=>array('admin'),
	$model->produk_nama,
);

$this->menu=array(
	array('label'=>'Tambah Produk', 'url'=>array('create')),
	array('label'=>'Hapus Produk', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->produk_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Kelola Produk', 'url'=>array('admin')),
);
?>

<div class="col-md-6">
<div class="media">
  <div class="media-left">
    <a href="#">
    <?php echo TextHelper::image($model->produk_img,'data/images','img-rounded img-max-width-150',true);?>
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><?php echo $model->produk_nama;?>
    
    </h4>
    <p><?php echo $model->produk_deskripsi;?></p>
	<p>Di tambahkan pada <strong><?php echo TextHelper::tanggal($model->produk_tanggal);?></strong> <br>
    <label class="label label-danger"><?php echo TextHelper::rawToRupiah($model->produk_harga).TextHelper::satuanHarga($model->produk_satuan);?></label>
    <label class="label label-success"><?php echo $model->produkKategori->katp_nama;?></label>
    <label class="label label-success"><?php echo $model->komentarsCount;?> Komentar</label></p>
    <hr>
    <a class="btn btn-warning btn-sm" href="<?php echo $this->createUrl('produk/update',array('id'=>$model->produk_id));?>">Sunting</a>
    <a class="btn delete btn-danger btn-sm" href="<?php echo $this->createUrl('produk/delete',array('id'=>$model->produk_id));?>">Hapus</a>
  </div>
</div>
</div>