<?php
/* @var $this PengaturanController */

$this->breadcrumbs=array(
	'Pengaturan'=>array('/pengaturan'),
	'Riwayat Transaksi',
);

$this->pageTitle = "Riwayat transaksi";
?>
<div class="well">
<h4>Daftar pemesanan produk yang dilakukan</h4>
<form>
	<div class="input-group col-md-6">
	<div class="input-group-btn">
			<input name="q" type="text" class="form-control" placeholder="Filter berdasarkan kode transaksi" value="<?php echo isset($_GET['q'])? trim($_GET['q']):'';?>">		
			<button type="submit" class="btn btn-default btn-warning">Filter</button>
	</div>
	</div>
</form>
<br>
<table class="table table-condensed table-striped table-hover table-bordered">
	<tr>
		<th>Kode Transaksi</th>
		<th>Tanggal</th>
		<th>Status</th>
		<th>...</th>
	</tr>
	<?php foreach($model as $row):?>
	<tr>
		<td><?php echo $row->trans_kodetrans;?></td>
		<td><?php echo TextHelper::tanggal($row->trans_tanggal);?></td>
		<td><?php echo $row->statusReadable();?></td>
		<td><a class="btn btn-bs btn-default btn-xs tombol" href="<?php echo $this->createUrl('pengaturan/transaksidetail',array('kodetrans'=>$row->trans_kodetrans));?>">Rincian</a></td>
	</tr>
	<?php endforeach;?>
</table>
<?php
		$this->widget('CLinkPager',array(
			'pages'=>$pagination,
			'maxButtonCount'=>4,
			'header'=>' ',
			'firstPageCssClass'=>'',
			'nextPageLabel'=>'>',
			'prevPageLabel'=>'<',
			'firstPageLabel'=>'<<',
			'lastPageLabel'=>'>>',
			'hiddenPageCssClass'=>'disabled',
			'selectedPageCssClass'=>'active',
			'htmlOptions'=>array('class'=>'pagination')
			));
			?>

</div>
