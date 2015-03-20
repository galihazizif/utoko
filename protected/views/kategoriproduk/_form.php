<?php
/* @var $this KategoriprodukController */
/* @var $model Kategoriproduk */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kategoriproduk-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<div class="form-group">
		<?php echo $form->labelEx($model,'katp_nama'); ?>
		<?php echo $form->textField($model,'katp_nama',array('size'=>60,'maxlength'=>70,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'katp_nama'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-primary')); ?>
		<a class="btn btn-default tombol" href="<?php echo $this->createUrl('produk/admin');?>">Kembali</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->