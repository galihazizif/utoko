<?php
$this->breadcrumbs=array(
	'Produk',
	);

$this->pageTitle = "Detail Produk ".Yii::app()->name;

?>
<div class="well" style="min-height: 400px">
	<h3><?php echo $model->produk_nama;?></h3>
	<div class="col-md-5 pull-left" style="margin-left: 0px; padding-left: 0px">
		<?php echo TextHelper::image($model->produk_img,'data/images','img-thumbnail pull-left',true);?>
		<table class="table table-condensed table-hover">
			<tr>
				<td><span class="glyphicon glyphicon-euro"></span></td>
				<td><?php echo TextHelper::rawToRupiah($model->produk_harga).TextHelper::satuanHarga($model->produk_satuan);?></td>
			</tr>
			<tr>
				<td><span class="glyphicon glyphicon-folder-close"></span></td>
				<td><label class="label label-danger"><?php echo $model->produk_qty.' barang tersedia'?></label></td>
			</tr>
		</table>
	</div>
	<p>
		<?php echo $model->produk_deskripsi;?>
	</p>
</div>


<?php if($model->produk_allowcomment == 1):?>
	<?php if($model->komentarsCount > 0):?>
		<h5><span class="glyphicon glyphicon-comment"></span> Komentar mengenai <?php echo $model->produk_nama;?></h5>
		<?php $this->renderPartial('/layouts/_komentar',array('model'=>$model->komentars));	?>
	<?php endif;?>
<hr>
<h5>Tambahkan Komentar</h5>
<?php $this->renderPartial('/komentar/form',array(
	'model'=>$komentar,
	));?>
<?php endif;?>
