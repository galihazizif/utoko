<?php
/* @var $this KategoriprodukController */
/* @var $data Kategoriproduk */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('katp_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->katp_id), array('view', 'id'=>$data->katp_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('katp_nama')); ?>:</b>
	<?php echo CHtml::encode($data->katp_nama); ?>
	<br />


</div>