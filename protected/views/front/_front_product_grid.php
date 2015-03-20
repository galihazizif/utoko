<div class="col-md-3 produk-grid well well-small"><?php echo TextHelper::image($data->produk_img,'data/images','img-grid img-thumbnail',true);?><h5><strong><?php echo $data->produk_nama?></strong></h5>
						<p class="justify"><?php echo substr($data->produk_deskripsi,0,150);?>
						<br>
						<label class="label label-info pull-left"><?php echo TextHelper::rawToRupiah($data->produk_harga).TextHelper::satuanHarga($data->produk_satuan);?></label><br>
						<a href="<?php echo $this->createUrl('produk/detail',array('id'=>$data->produk_id));?>" class="btn btn-primary btn-xs tombol">Selengkapnya</a>
						</p>
</div>
