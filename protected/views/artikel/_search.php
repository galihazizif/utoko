<?php
/* @var $this ArtikelController */
/* @var $model Artikel */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="input-group col-md-6">
		<?php echo $form->textField($model,'artikel_judul',array('size'=>60,'maxlength'=>70,'class'=>'form-control','placeholder'=>'Filter berdasarakan nama berita / artikel')); ?>
		<div class="input-group-btn">
			<button type="submit" class="btn btn-default btn-warning">Filter</button>
		</div>
	</div>

<?php $this->endWidget(); ?>
