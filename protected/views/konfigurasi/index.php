<?php
/* @var $this KonfigurasiController */

$this->breadcrumbs=array(
	'Index',
);
?>
<div class="row">
<div class="col-md-12"><h4><strong>Informasi Umum</strong></h4></div>	
<div class="col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading"> 
			Nama Toko Online <a class="pull-right btn btn-primary btn-xs tombol" title="Edit" href="<?php echo $this->createUrl('konfigurasi/editatribut',array('id'=>12));?>"><span class="glyphicon glyphicon-pencil"></span> </a>
		</div>
		<div class="panel-body"><?php echo $text[12]; ?></div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			Email Admin <a class="pull-right btn btn-primary btn-xs tombol" title="Edit" href="<?php echo $this->createUrl('konfigurasi/editatribut',array('id'=>15));?>"><span class="glyphicon glyphicon-pencil"></span> </a>
		</div>
		<div class="panel-body">
			<?php echo $text[15]; ?>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			Telepon <a class="pull-right btn btn-primary btn-xs tombol" title="Edit" href="<?php echo $this->createUrl('konfigurasi/editatribut',array('id'=>16));?>"><span class="glyphicon glyphicon-pencil"></span> </a>
		</div>
		<div class="panel-body">
			<?php echo $text[16]; ?>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			Deskripsi <a class="pull-right btn btn-primary btn-xs tombol" title="Edit" href="<?php echo $this->createUrl('konfigurasi/editatribut',array('id'=>14));?>"><span class="glyphicon glyphicon-pencil"></span> </a>
		</div>
		<div class="panel-body">
			<p>
				<?php echo $text[14]; ?>
			</p>
		</div>
	</div>		

</div>
<div class="col-md-5">
<div class="panel panel-primary">
	<div class="panel-heading">
		Daftar Rekening Bank <a class="pull-right btn btn-xs btn-default tombol" title="Tambah" href="<?php echo $this->createUrl('konfigurasi/createatribut',array('kategori'=>2));?>"><span class="glyphicon glyphicon-plus"></span> </a>
	</div>
	<div class="panel-body">
		<?php if(count($rekening) > 0):?>
			<ol>
				<?php foreach($rekening as $item):?>
					<li><?php echo $item->artribut_deskripsi.' '.$item->atribut_isi;?>
					<a class="tombol btn btn-default btn-xs" title="Edit" href="<?php echo $this->createUrl('konfigurasi/editatribut',array('id'=>$item->atribut_id));?>"><span class="glyphicon glyphicon-pencil"></span> </a>
					<a class="delete btn btn-danger btn-xs" title="Hapus" href="<?php echo $this->createUrl('konfigurasi/deleteatribut',array('id'=>$item->atribut_id));?>"><span class="glyphicon glyphicon-remove"></span> </a>
					</li>
				<?php endforeach;?>
			</ol>
		<?php else:?>
			Belum ada data rekening BANK yang dimasukan
		<?php endif;?>
	</div>
</div>
	
</div>
</div>


<p><strong>Konfigurasi</strong></p>
<div class="row">
<div class="col-md-3">
<a class="btn btn-warning btn-lg btn-block tombol" href="<?php echo $this->createUrl('konfigurasi/warna');?>"><span class="glyphicon glyphicon-leaf"></span>
<h3>Skema Warna</h3>
</a>
</div>
<div class="col-md-3">
<a class="btn btn-default btn-lg btn-block tombol" href="#"><span class="glyphicon glyphicon-align-left"></span>
<h3>Macam - Macam</h3>
</a>
</div>
</div>