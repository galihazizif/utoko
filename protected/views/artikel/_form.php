<?php
/* @var $this ArtikelController */
/* @var $model Artikel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'artikel-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom dengan tanda <span class="required">*</span> harus terisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'artikel_judul'); ?>
		<?php echo $form->textField($model,'artikel_judul',array('size'=>60,'maxlength'=>70,'class'=>'form-control','placeholder'=>'Judul Artikel / Berita (Maksimal 70 karakter)')); ?>
		<?php echo $form->error($model,'artikel_judul'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'artikel_isi'); ?>
		<?php echo $form->textArea($model,'artikel_isi',array('rows'=>8,'size'=>60,'maxlength'=>1000,'class'=>'form-control','placeholder'=>'Isi Artikel / Berita (Maksimal 1000 karakter)')); ?>
		<?php echo $form->error($model,'artikel_isi'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-primary')); ?>
		<a class="btn btn-default tombol" href="<?php echo $this->createUrl('artikel/admin');?>">Kembali</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->