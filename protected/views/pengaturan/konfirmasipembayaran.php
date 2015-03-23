<?php
/* @var $this KonfirmasiPembayaranFormController */
/* @var $model KonfirmasiPembayaranForm */
/* @var $form CActiveForm */
$this->pageTitle = 'Konfirmasi Pembayaran';
?>
<h4><u><strong>Konfirmasi pembayaran pemesanan <?php echo $transaksi->trans_kodetrans;?></strong></u></h4>
<p>Konfirmasikan pembayaran anda melalui halaman ini untuk mempercepat proses validasi pembayaran. Dimohon untuk mengkonfirmasi hanya jika pesanan telah dibayar. Konfirmasi pembayaran hanya dapat dilakukan sekali untuk tiap pemesanan. </p>
<div class="">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'konfirmasi-pembayaran-form',
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
				'placeholder'=>'DD/MM/YYYY',
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
		<?php echo $form->textField($model,'norekasal',array('class'=>'form-control','placeholder'=>'misal: 012-234-4567')); ?>
		<?php echo $form->error($model,'norekasal'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'namarekasal'); ?>
		<?php echo $form->textField($model,'namarekasal',array('class'=>'form-control','placeholder'=>'misal: Moses Adam')); ?>
		<?php echo $form->error($model,'namarekasal'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'nominal'); ?>
		<?php echo $form->textField($model,'nominal',array('class'=>'form-control','placeholder'=>'hanya isi dengan angka, tanpa tanda apapun, misal: 50000')); ?>
		<?php echo $form->error($model,'nominal'); ?>
	</div>


	<div class="form-group">
		<?php echo CHtml::submitButton('Kirim',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
	document.addEventListener('DOMContentLoaded',function(){
		$('#konfirmasi-pembayaran-form').submit(function(){
			return confirm('Apakah anda sudah yakin?.');
		});
	});
</script>