<?php
/* @var $this KomentarController */
/* @var $model Komentar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'komentar_id'); ?>
		<?php echo $form->textField($model,'komentar_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'komentar_prod_id'); ?>
		<?php echo $form->textField($model,'komentar_prod_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'komentar_inreply'); ?>
		<?php echo $form->textField($model,'komentar_inreply',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'komentar_isi'); ?>
		<?php echo $form->textField($model,'komentar_isi',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'komentar_tanggal'); ?>
		<?php echo $form->textField($model,'komentar_tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'komentar_pengirim'); ?>
		<?php echo $form->textField($model,'komentar_pengirim'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'komentar_status'); ?>
		<?php echo $form->textField($model,'komentar_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'komentar_email'); ?>
		<?php echo $form->textField($model,'komentar_email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'komentar_nama'); ?>
		<?php echo $form->textField($model,'komentar_nama',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->