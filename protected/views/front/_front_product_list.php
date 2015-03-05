	<div class="col-md-10 well well-small"><?php echo TextHelper::image($data->produk_img,'data/images','img-list pull-left img-thumbnail',true);?><h5><strong>Produk Unggulan</strong></h5>
		<p class="justify"><?php echo substr($data->produk_deskripsi,0,150);?> <a href="<?php echo $this->createUrl('produk/detail',array('id'=>$data->produk_id));?>" class="btn btn-primary btn-xs tombol">Selengkapnya</a></p>

		</div>