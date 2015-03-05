<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>




<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'htmlOptions'=>array('class'=>'form-signin'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
		<h2 class="form-signin-heading">Login</h2>
	
		<?php echo $form->labelEx($model,'username',array('class'=>'sr-only')); ?>
		<?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Alamat email')); ?>
		<?php echo $form->error($model,'username'); ?>
	

	
		<?php echo $form->labelEx($model,'password',array('class'=>'sr-only')); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
		<?php echo $form->error($model,'password'); ?>

	<div class="checkbox">
		<label>
		<?php echo $form->checkBox($model,'rememberMe'); ?> Remember Me
		</label>
	</div>

	
	<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-lg btn-primary btn-block')); ?>
	<a href="<?php echo $this->createUrl('front/index');?>" class="btn btn-lg btn-block btn-default">Kembali</a>
	

<?php $this->endWidget(); ?>
