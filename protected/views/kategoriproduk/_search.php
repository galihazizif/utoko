<?php
/* @var $this ProdukController */
/* @var $model Produk */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="input-group col-md-6">
		<?php echo $form->textField($model,'katp_nama',array('size'=>60,'maxlength'=>70,'class'=>'form-control','placeholder'=>'Filter berdasarakan nama kategori produk')); ?>
		<div class="input-group-btn">
			<button type="submit" class="btn btn-default btn-warning">Filter</button>
		</div>
	</div>

<?php $this->endWidget(); ?>
