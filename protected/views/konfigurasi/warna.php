<?php
/* @var $this KonfigurasiController */

$this->breadcrumbs=array(
	'Konfigurasi'=>array('konfigurasi/index'),
	'Skema dan Warna',
);
?>
<h4><strong>Pengaturan Skema Warna dan Latar</strong></h4>
<p>Pemilihan kombinasi warna yang tepat dapat membuat penampilan toko online anda sedap dipandang, selamat bereksperimen.</p>
<form enctype="multipart/form-data" action="<?php echo $this->createUrl($this->route);?>" method="POST">
	<?php foreach ($model as $item):?>
		<?php if($item->atribut_id == Styler::NAVBAR):?>
			<div class="form-group col-md-12">
				<label><?php echo $item->artribut_deskripsi;?></label>
				<div class="input-group cp col-md-4">
					<input id="" type="text" name="<?php echo $item->atribut_id;?>" value="<?php echo $item->atribut_isi;?>" class="colorpicker form-control">	
					<span class="input-group-addon"><i></i></span>
				</div>
			</div>
		<?php elseif($item->atribut_id == Styler::BOXHEADER):?>
			<div class="form-group col-md-12">
				<label><?php echo $item->artribut_deskripsi;?></label>
				<div class="input-group cp col-md-4">
					<input id="" type="text" name="<?php echo $item->atribut_id;?>" value="<?php echo $item->atribut_isi;?>" class="colorpicker form-control">	
					<span class="input-group-addon"><i></i></span>
				</div>
			</div>
		<?php elseif($item->atribut_id == Styler::BGTIPE):?>
			<div class="form-group col-md-12">
				<label><?php echo $item->artribut_deskripsi;?></label>
				<div class="radio">
					<label>
					<input id="bgtipe-color" type="radio" value="color" <?php echo ($item->atribut_isi == 'color')? 'checked': '';?> name="<?php echo Styler::BGTIPE;?>">
					Warna
					</label>
					<br>
					<label>
					<input id="bgtipe-img" type="radio" value="img" <?php echo ($item->atribut_isi == 'img')? 'checked': '';?> name="<?php echo Styler::BGTIPE;?>">
					Gambar
					</label>
				</div>
			</div>
		<?php elseif($item->atribut_id == Styler::BGCOLOR):?>
			<div id="bg-color" class="form-group col-md-12" style="display:none">
				<label><?php echo $item->artribut_deskripsi;?></label>
				<div class="input-group cp col-md-4">
					<input id="" type="text" name="<?php echo $item->atribut_id;?>" value="<?php echo $item->atribut_isi;?>" class="colorpicker form-control">	
					<span class="input-group-addon"><i></i></span>
				</div>
			</div>
		<?php elseif($item->atribut_id == Styler::FOOTERLISTCOLOR):?>
			<div class="form-group col-md-12">
				<label><?php echo $item->artribut_deskripsi;?></label>
				<div class="input-group cp col-md-4">
					<input id="" type="text" name="<?php echo $item->atribut_id;?>" value="<?php echo $item->atribut_isi;?>" class="colorpicker form-control">	
					<span class="input-group-addon"><i></i></span>
				</div>
			</div>
		<?php elseif($item->atribut_id == Styler::WELLCOLOR):?>
			<div class="form-group col-md-12">
				<label><?php echo $item->artribut_deskripsi;?></label>
				<div class="input-group cp col-md-4">
					<input id="" type="text" name="<?php echo $item->atribut_id;?>" value="<?php echo $item->atribut_isi;?>" class="colorpicker form-control">	
					<span class="input-group-addon"><i></i></span>
				</div>
			</div>
		<?php elseif($item->atribut_id == Styler::BGIMG):?>
			<div id="bg-img" class="form-group col-md-4" style="display:none">
				<label><?php echo $item->artribut_deskripsi;?></label>
				<input type="file" name="<?php echo $item->atribut_id;?>" class="form-control">
			</div>
		<?php elseif($item->atribut_id == Styler::BGIMGREPEAT):?>
			<div id="bg-img-repeat" class="form-group col-md-4" style="display:none">
				<label><?php echo $item->artribut_deskripsi;?></label>
				<?php echo CHtml::dropDownList($item->atribut_id,$item->atribut_isi,Styler::imgRepeatType(),array('class'=>'form-control'));?>
			</div>
		<?php elseif($item->atribut_id == Styler::KOMENTARBG):?>
			<div class="form-group col-md-12">
				<label><?php echo $item->artribut_deskripsi;?></label>
				<div class="input-group cp col-md-4">
					<input id="" type="text" name="<?php echo $item->atribut_id;?>" value="<?php echo $item->atribut_isi;?>" class="colorpicker form-control">	
					<span class="input-group-addon"><i></i></span>
				</div>
			</div>
		<?php endif;?>
	<?php endforeach;?>
	<div class="form-group col-md-12">
		<input type="submit" class="btn btn-primary" value="Simpan">
	</div>
</form>
<hr>
<div class="col-md-12">
<iframe id="iframe" src="<?php echo $this->createUrl('front/index');?>"></iframe>
</div>

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded',function(){
		$('.cp').colorpicker();

		$('#bgtipe-color').click(function(){
			$('#bg-img').hide();
			$('#bg-img-repeat').hide();
			$('#bg-color').show();
		});

		$('#bgtipe-img').click(function(){
			$('#bg-color').hide();
			$('#bg-img').show();
			$('#bg-img-repeat').show();
		});
	});
</script>