<?php
/* @var $this KonfirmasiPembayaranFormController */
/* @var $model KonfirmasiPembayaranForm */
/* @var $form CActiveForm */
?>
<h4><u><strong>Konfirmasi pembayaran pemesanan <?php echo $transaksi->trans_kodetrans;?></strong></u></h4>
<p>Konfirmasikan pembayaran anda melalui halaman ini hanya jika invoice telah dibayar</p>
<div class="">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'konfirmasi-pembayaran-form-konfirmasipembayaran-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	

	<div class="form-group">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'name'=>'KonfirmasiPembayaranForm[tanggal]',
    // additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fade',
				'dateFormat'=>'dd/mm/yy',
				),
			'htmlOptions'=>array(
				'class'=>'form-control',
				),
			));
			?>
		<?php echo $form->error($model,'tanggal'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'norektujuan'); ?>
		<?php echo $form->dropDownList($model,'norektujuan',$rekening,array('class'=>'form-control','placeholder'=>'')); ?>
		<?php echo $form->error($model,'norektujuan'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'norekasal'); ?>
		<?php echo $form->textField($model,'norekasal',array('class'=>'form-control','placeholder'=>'')); ?>
		<?php echo $form->error($model,'norekasal'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'namarekasal'); ?>
		<?php echo $form->textField($model,'namarekasal',array('class'=>'form-control','placeholder'=>'')); ?>
		<?php echo $form->error($model,'namarekasal'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nominal'); ?>
		<?php echo $form->textField($model,'nominal',array('class'=>'form-control','placeholder'=>'')); ?>
		<?php echo $form->error($model,'nominal'); ?>
	</div>


	<div class="form-group">
		<?php echo CHtml::submitButton('Kirim',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
</script>