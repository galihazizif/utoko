<?php
/* @var $this PengaturanController */

$this->breadcrumbs=array(
	'Pengaturan',
);
$this->pageTitle="Pengaturan";
?>
<div class="well">
<h4>Berikut ini informasi mengenai akun anda</h4>

<dl class="dl-horizontal">
	<dt>Nama</dt>
	<dd><?php echo $model->user_nama;?></dd>
	<dt>Email</dt>
	<dd><?php echo $model->user_email;?></dd>
	<dt>Alamat</dt>
	<dd><?php echo $model->user_alamat.', '.Lokasi::lokasiLengkap($model->user_lokasi);?></dd>
	<dt>Telepon (SMS)</dt>
	<dd><?php echo $model->user_telepon;?></dd>
	<dt>Password</dt>
	<dd><a class="btn btn-default btn-xs" href="#">Ubah Password</a></dd>
</dl>
</div>