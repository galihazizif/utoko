<?php
/* @var $this KomentarController */
/* @var $model Komentar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'komentar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'komentar_prod_id'); ?>
		<?php echo $form->textField($model,'komentar_prod_id'); ?>
		<?php echo $form->error($model,'komentar_prod_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'komentar_inreply'); ?>
		<?php echo $form->textField($model,'komentar_inreply',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'komentar_inreply'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'komentar_isi'); ?>
		<?php echo $form->textField($model,'komentar_isi',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'komentar_isi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'komentar_tanggal'); ?>
		<?php echo $form->textField($model,'komentar_tanggal'); ?>
		<?php echo $form->error($model,'komentar_tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'komentar_pengirim'); ?>
		<?php echo $form->textField($model,'komentar_pengirim'); ?>
		<?php echo $form->error($model,'komentar_pengirim'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'komentar_status'); ?>
		<?php echo $form->textField($model,'komentar_status'); ?>
		<?php echo $form->error($model,'komentar_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'komentar_email'); ?>
		<?php echo $form->textField($model,'komentar_email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'komentar_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'komentar_nama'); ?>
		<?php echo $form->textField($model,'komentar_nama',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'komentar_nama'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->