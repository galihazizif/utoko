<?php
/* @var $this AtributController */
/* @var $model Atribut */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'atribut-editatribut-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<h4>Ubah <?php echo $model->artribut_deskripsi;?></h4>

	<div class="form-group">
		<?php echo $form->labelEx($model,'atribut_isi'); ?>
		<?php echo $form->textArea($model,'atribut_isi',array('class'=>'form-control','rows'=>9)); ?>
		<?php echo $form->error($model,'atribut_isi'); ?>
	</div>


	<div class="form-group">
		<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-primary')); ?>
		<a class="btn btn-default tombol" href="<?php echo $this->createUrl('konfigurasi/index');?>">Kembali</a>
	</div>

<?php $this->endWidget(); ?>

