	<div class="col-md-10 well well-small"><?php echo TextHelper::image($data->produk_img,'data/images','img-list pull-left img-thumbnail',true);?><h5><strong><?php echo $data->produk_nama;?></strong> <label class="label label-danger"><?php echo TextHelper::rawToRupiah($data->produk_harga).TextHelper::satuanHarga($data->produk_satuan);?></label></h5>
		<p class="justify"><?php echo substr($data->produk_deskripsi,0,150);?> <a href="<?php echo $this->createUrl('produk/detail',array('id'=>$data->produk_id));?>" class="btn btn-primary btn-xs tombol">Selengkapnya</a></p>

		</div>