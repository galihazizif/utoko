<?php
/* @var $this KomentarController */
/* @var $model Komentar */
/* @var $form CActiveForm */
?>

<div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'komentar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	
	<div class="form-group">
		<?php echo $form->textField($model,'komentar_email',array('size'=>45,'maxlength'=>45,'class'=>'form-control','placeholder'=>'Email Anda')); ?>
		<?php echo $form->error($model,'komentar_email'); ?>
	</div>

	<div class="form-group">		
		<?php echo $form->textField($model,'komentar_nama',array('size'=>45,'maxlength'=>45,'class'=>'form-control','placeholder'=>'Nama Anda')); ?>
		<?php echo $form->error($model,'komentar_nama'); ?>
	</div>

	<div class="form-group">
		
		<?php echo $form->textArea($model,'komentar_isi',array('size'=>60,'maxlength'=>300,'class'=>'form-control','placeholder'=>'Tulis komentar anda mengenai produk ini')); ?>
		<?php echo $form->error($model,'komentar_isi'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="form-group">
		<?php $this->widget('CCaptcha', array(
			'buttonOptions'=>array('class'=>'btn btn-default btn-xs','style'=>'margin-left: 3px'),
			'buttonLabel'=>'<span class="glyphicon glyphicon-repeat"></span>',
			'imageOptions'=>array('class'=>'img-thumbnail'))
			); ?>
		<?php echo $form->labelEx($model,'verifyCode'); ?><br>
		<?php echo $form->textField($model,'verifyCode',array('placeholder'=>'Masukkan captcha','class'=>'form-control')); ?>
		<?php echo $form->error($model,'verifyCode', array('class'=>'cerror')); ?>
	</div>
	<?php endif; ?>

	<div class="form-group">
		<?php echo CHtml::submitButton('Kirim Komentar !',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->