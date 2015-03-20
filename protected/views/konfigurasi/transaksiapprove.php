<?php
/* @var $this PengaturanController */

$this->breadcrumbs=array(
	'Pengaturan'=>array('/pengaturan'),
	'Riwayat Transaksi'=>array('/pengaturan/transaksi'),
	'Rincian',
);

$jmlRow = 0;
$this->pageTitle = "Detail";
?>
<div class="well">
<h4>Konfirmasi Transaksi</h4>
<dl class="dl-horizontal">
	<dt>Kode Transaksi</dt>
	<dd><?php echo $model[0]->trans_kodetrans;?></dd>
	<dt>Tanggal Pemesanan</dt>
	<dd><?php echo TextHelper::tanggal($model[0]->trans_tanggal);?></dd>
	<dt>Status</dt>
	<dd><span class="label label-info"><?php echo $model[0]->statusReadable();?></span></dd>
</dl>

<?php if($model[0]->trans_status == Transaksi::STATUS_ADDED):?>
<small>Total biaya berikut ini belum termasuk biaya packing dan ekspedisi</small>
<?php endif;?>
<table class="table table-condensed table-striped table-hover table-bordered">
	<tr>
		<th>Nama</th><th>Qty</th><th class="align-right">Harga Satuan</th><th class="align-right" style="width: 250px">Total</th>
	</tr>
	<?php foreach($model as $row):?>
	<?php $jmlRow = ($row->transProduk->produk_harga * $row->trans_qty) + $jmlRow;?>
	<tr>
		<td>
			<?php echo $row->transProduk->produk_nama;?>
		</td>
		<td>
			<?php echo $row->trans_qty;?>
		</td>
		<td class="align-right">
			<?php echo TextHelper::rawToRupiah($row->transProduk->produk_harga);?>
		</td>
		<td class="align-right">
			<?php echo TextHelper::rawToRupiah($row->transProduk->produk_harga * $row->trans_qty);?>
		</td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td class="align-right" colspan="3">Jumlah Total</td>
		<td class="align-right"><?php echo TextHelper::rawToRupiah($jmlRow);?></td>
	</tr>
	<tr>
	<form id="form-approve" method="POST" action="<?php echo $this->createUrl('konfigurasi/transaksiapprove',array('kodetrans'=>$row->trans_kodetrans));?>">
		<td class="align-right" colspan="3">Biaya Tambahan (Packing dan Pengiriman)</td>
		<td class="align-right" ><input type="text" name="Transaksi[trans_biayatambahan]" class="form-control align-right" value="0" placeholder="Diisi angka saja."></td>
	</form>
	</tr>
</table>
<div class="row">
<div class="col-md-5">
<dl>
	<dt>Nama Pemesan</dt>
	<dd><?php echo $row->transUser->user_nama;?></dd>
	<dt>Alamat Pengiriman</dt>
	<dd><?php echo $row->trans_alamat.', '.Lokasi::lokasiLengkap($row->trans_lokasi);?></dd>
	<dt>Kontak</dt>
	<dd><?php echo $row->transUser->user_telepon;?></dd>
</dl>
</div>
<div class="col-md-5">
	<button id="btn-approve" type="button" href="<?php echo $this->createUrl('konfigurasi/transaksiapprove'); ?>" class="btn btn-primary btn-lg btn-block">Approve</button></p>
</div>
</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded',function(){
		$('#btn-approve').click(function(){
			if(confirm('Apakah anda sudah yakin?'))
				$('#form-approve').submit();
		});
	});
</script>