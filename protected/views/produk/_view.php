<?php
/* @var $this ProdukController */
/* @var $data Produk */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('produk_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->produk_id), array('view', 'id'=>$data->produk_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('produk_nama')); ?>:</b>
	<?php echo CHtml::encode($data->produk_nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('produk_deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->produk_deskripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('produk_kategori')); ?>:</b>
	<?php echo CHtml::encode($data->produk_kategori); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('produk_harga')); ?>:</b>
	<?php echo CHtml::encode($data->produk_harga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('produk_satuan')); ?>:</b>
	<?php echo CHtml::encode($data->produk_satuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('produk_qty')); ?>:</b>
	<?php echo CHtml::encode($data->produk_qty); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('produk_status')); ?>:</b>
	<?php echo CHtml::encode($data->produk_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('produk_tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->produk_tanggal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('produk_allowcomment')); ?>:</b>
	<?php echo CHtml::encode($data->produk_allowcomment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('produk_img')); ?>:</b>
	<?php echo CHtml::encode($data->produk_img); ?>
	<br />

	*/ ?>

</div>