<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="well">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-registrasi-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<h3><strong>Registrasi</strong></h3>
	<p>Untuk melakukan pemesanan, anda harus terdaftar terlebih dahulu.</p>

	<?php echo $form->errorSummary($model); ?>

<div class="row">
	<div class="col-md-5 form-group">
		<?php echo $form->labelEx($model,'user_nama'); ?>
		<?php echo $form->textField($model,'user_nama',array('class'=>'form-control','placeholder'=>'Masukan nama lengkap anda')); ?>
		<?php echo $form->error($model,'user_nama'); ?>
	</div>
	<div class="form-group col-md-5">
		<?php echo $form->labelEx($model,'user_telepon'); ?>
		<?php echo $form->textField($model,'user_telepon',array('class'=>'form-control','placeholder'=>'Masukan nomor telepon Anda')); ?>
		<?php echo $form->error($model,'user_telepon'); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-5 form-group">
		<?php echo $form->labelEx($model,'user_email'); ?>
		<?php echo $form->textField($model,'user_email',array('class'=>'form-control','placeholder'=>'Masukan email anda')); ?>
		<?php echo $form->error($model,'user_email'); ?>
	</div>
	<div class="form-group col-md-5">
		<?php echo $form->labelEx($model,'user_password'); ?>
		<?php echo $form->passwordField($model,'user_password',array('class'=>'form-control','placeholder'=>'Masukan password')); ?>
		<?php echo $form->error($model,'user_password'); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-5 form-group">
		<?php echo $form->labelEx($model,'confirmEmail'); ?>
		<?php echo $form->textField($model,'confirmEmail',array('class'=>'form-control','placeholder'=>'Konfirmasi email')); ?>
		<?php echo $form->error($model,'confirmEmail'); ?>
	</div>
	<div class="form-group col-md-5">
		<?php echo $form->labelEx($model,'confirmPassword'); ?>
		<?php echo $form->passwordField($model,'confirmPassword',array('class'=>'form-control','placeholder'=>'Konfirmasi password')); ?>
		<?php echo $form->error($model,'confirmPassword'); ?>
	</div>
</div>


<div class="row">
	<div class="form-group col-md-5">
		<?php echo $form->labelEx($model,'provinsi'); ?>
		<?php echo $form->dropDownList($model,'provinsi',Lokasi::arrayProvinsi(),array(
			'class'=>'form-control',
			'ajax'=>array(
				'type'=>'GET',
				'url'=>$this->createUrl('lokasi/updateKabupaten'),
				'update'=>'#User_kabupaten',
				),
			)); ?>
		<?php echo $form->error($model,'provinsi'); ?>
	</div>
</div>
<div class="row">
	<div class="form-group col-md-5">
		<?php echo $form->labelEx($model,'kabupaten'); ?>
		<?php echo $form->dropDownList($model,'kabupaten',$listKabupaten,array(
			'class'=>'form-control',
			'ajax'=>array(
				'type'=>'GET',
				'url'=>$this->createUrl('lokasi/updateKecamatan'),
				'update'=>'#User_kecamatan',
				),
			)); ?>
		<?php echo $form->error($model,'kabupaten'); ?>
	</div>
</div>

<div class="row">
	<div class="form-group col-md-5">
		<?php echo $form->labelEx($model,'kecamatan'); ?>
		<?php echo $form->dropDownList($model,'kecamatan',$listKecamatan,array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'kecamatan'); ?>
	</div>
</div>

<div class="row">
	<div class="form-group col-md-5">
		<?php echo $form->labelEx($model,'user_alamat'); ?>
		<?php echo $form->textArea($model,'user_alamat',array('class'=>'form-control','rows'=>'4','placeholder'=>'Misal: Jalan Galunggung 4, RT 09/ RW 12')); ?>
		<?php echo $form->error($model,'user_alamat'); ?>
	</div>
	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="form-group col-md-5">
		<?php echo $form->labelEx($model,'verifyCode'); ?><br>
		<?php $this->widget('CCaptcha', array(
			'buttonOptions'=>array('class'=>'btn btn-default btn-xs','style'=>'margin-left: 3px'),
			'buttonLabel'=>'<span class="glyphicon glyphicon-repeat"></span>',
			'imageOptions'=>array('class'=>'img-thumbnail'))
			); ?>
		<?php echo $form->textField($model,'verifyCode',array('placeholder'=>'Masukkan captcha','class'=>'form-control')); ?>
		<?php echo $form->error($model,'verifyCode', array('class'=>'cerror')); ?>
	</div>
	<?php endif; ?>
</div>

<div class="row">
	<div class="form-group col-md-5">
	<p><small>Dengan melakukan pendaftaran maka anda setuju dengan <a href="<?php echo $this->createUrl('front/tc');?>">Syarat dan Ketentuan</a> yang berlaku.</small></p>
		<?php echo CHtml::submitButton('Daftar Sekarang !',array('class'=>'btn btn-primary tombol')); ?>
	</div>
</div>

<?php $this->endWidget(); ?>
</div>