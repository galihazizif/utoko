<?php
/* @var $this ArtikelController */
/* @var $data Artikel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('artikel_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->artikel_id), array('view', 'id'=>$data->artikel_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('artikel_judul')); ?>:</b>
	<?php echo CHtml::encode($data->artikel_judul); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('artikel_isi')); ?>:</b>
	<?php echo CHtml::encode($data->artikel_isi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('artikel_tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->artikel_tanggal); ?>
	<br />


</div>