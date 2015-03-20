<?php
/* @var $this ProdukController */
/* @var $model Produk */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'produk-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="">Kolom dengan tanda <span class="required">*</span> harus terisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'produk_nama'); ?>
		<?php echo $form->textField($model,'produk_nama',array('size'=>60,'maxlength'=>70,'class'=>'form-control','placeholder'=>'Masukan nama produk (Maksimal 70 karakter)')); ?>
		<?php echo $form->error($model,'produk_nama'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'produk_deskripsi'); ?>
		<?php echo $form->textArea($model,'produk_deskripsi',array('size'=>60,'maxlength'=>700,'cols'=>'20','rows'=>'7','class'=>'form-control','placeholder'=>'Deskripsi produk (Maksimal 700 karakter)')); ?>
		<?php echo $form->error($model,'produk_deskripsi'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'produk_kategori'); ?>
		<?php echo $form->dropDownList($model,'produk_kategori',$kategoriProduk,array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'produk_kategori'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'produk_harga'); ?>
		<?php echo $form->textField($model,'produk_harga',array('size'=>10,'maxlength'=>10,'class'=>'form-control','placeholder'=>'Harga satuan produk dalam Rupiah')); ?>
		<?php echo $form->error($model,'produk_harga'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'produk_satuan'); ?>
		<?php echo $form->textField($model,'produk_satuan',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>'Satuan produk, misal: 1 Kg, 5 Kg, 1 Unit, 10 Pieces ')); ?>
		<?php echo $form->error($model,'produk_satuan'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'produk_qty'); ?>
		<?php echo $form->textField($model,'produk_qty',array('class'=>'form-control','placeholder'=>'Banyaknya produk dalam persedian')); ?>
		<?php echo $form->error($model,'produk_qty'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'produk_allowcomment'); ?>
		<?php echo $form->dropDownList($model,'produk_allowcomment',$komentarList,array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'produk_allowcomment'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'produk_img'); ?>
		<?php echo $form->fileField($model,'produk_img',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'produk_img'); ?>
	</div>

<?php if(!$model->isNewRecord):?>
<div class="row">
	<div class="col-md-3">
		<?php echo TextHelper::image($model->produk_img,'data/images','img-thumbnail',true);?>
	</div>
</div>
<?php endif;?>
<br>
	<div class="form-group">
		<?php echo CHtml::submitButton('Simpan',array('class'=>'btn btn-primary')); ?>
		<a class="btn btn-default tombol" href="<?php echo $this->createUrl('produk/admin');?>">Kembali</a>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->