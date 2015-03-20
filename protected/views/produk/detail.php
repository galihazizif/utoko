<?php
$this->breadcrumbs=array(
	'Produk',
	);

$this->pageTitle = $model->produk_nama;
$this->ogDescription = substr($model->produk_deskripsi,0,200);
$this->ogImage = Yii::app()->getBaseUrl(true).'/data/images/'.$model->produk_img;
$this->ogUrl = Yii::app()->getBaseUrl(true);
$this->ogPrice = $model->produk_harga;

?>
<div class="well" style="min-height: 500px">
	<h3><?php echo $model->produk_nama;?></h3>
	<div class="col-md-5 pull-left" style="margin-left: 0px; padding-left: 0px">
		<?php echo TextHelper::image($model->produk_img,'data/images','img-thumbnail pull-left',true);?>
		<table class="table table-condensed">
			<tr>
				<td><span class="glyphicon glyphicon-euro"></span></td>
				<td><?php echo TextHelper::rawToRupiah($model->produk_harga).TextHelper::satuanHarga($model->produk_satuan);?></td>
			</tr>
			<tr>
				<td><span class="glyphicon glyphicon-folder-close"></span></td>
				<td>
				<?php if($model->produk_qty > 0):?>
					<label class="label label-success"><?php echo $model->produk_qty.' barang tersedia'?></label>
					<?php $hide = "";?>
				<?php else:?>
					<label class="label label-danger">Stok habis</label>
					<?php $hide = "hide";?>
				<?php endif;?>
				</td>
			</tr>
			<tr class="<?php echo $hide;?>">
				<td><span class="glyphicon glyphicon-shopping-cart"></span></td>
				<td>
				<form method="GET" action="<?php echo $this->createUrl('cart/tambah',array('id'=>$model->produk_id));?>">
				<div class="form-group0">
				<div class="input-group input-group-sm">

					<input type="text" name="qty" class="form-control" placeholder="Banyaknya" value="1">
					<span class="input-group-addon">
						<?php echo $model->produk_satuan;?>
					</span>
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary btn-sm tombol">Beli </button>
					</span>
				</div>
				</div>
				</form>
				</td>
			</tr>
			<tr>
				<td colspan="2"><a href="<?php echo $this->createUrl('front/index');?>" class="btn btn-sm btn-default btn-block tombol">&lt;&lt; Kembali</a></td>
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
		<?php $this->renderPartial('/layouts/_komentar',array('model'=>$komentarExist));	?>
		<?php
		$this->widget('CLinkPager',array(
			'pages'=>$pagination,
			'maxButtonCount'=>4,
			'header'=>' ',
			'firstPageCssClass'=>'',
			'nextPageLabel'=>'>',
			'prevPageLabel'=>'<',
			'firstPageLabel'=>'<<',
			'lastPageLabel'=>'>>',
			'hiddenPageCssClass'=>'disabled',
			'selectedPageCssClass'=>'active',
			'htmlOptions'=>array('class'=>'pagination')
			));
			?>

		<?php endif;?>
		<hr>
		<h5>Tambahkan Komentar</h5>
		<?php $this->renderPartial('/komentar/form',array(
			'model'=>$komentar,
			));
			?>
		<?php endif;?>
