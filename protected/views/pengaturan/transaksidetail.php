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
<h4>Rincian Transaksi</h4>
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
		<th>Nama</th><th>Qty</th><th class="align-right">Harga Satuan</th><th class="align-right">Total</th>
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
	<?php if($row->trans_status != Transaksi::STATUS_ADDED):?>
		<tr>
			<td class="align-right" colspan="3">Biaya packing dan pengiriman</td>
			<td class="align-right"><?php echo TextHelper::rawToRupiah($row->trans_biaya);?></td>
			<?php $jmlRow = $jmlRow + $row->trans_biaya;?>
		</tr>	
	<?php endif;?>
	<tr>
		<td class="align-right" colspan="3">Jumlah Total</td>
		<td class="align-right"><?php echo TextHelper::rawToRupiah($jmlRow);?></td>
	</tr>
</table>
<div class="row">
<div class="col-md-5">
<dl>
	<dt>Nama Pemesan</dt>
	<dd><?php echo $user->user_nama;?></dd>
	<dt>Alamat Pengiriman</dt>
	<dd><?php echo $row->trans_alamat.', '.Lokasi::lokasiLengkap($row->trans_lokasi);?></dd>
	<dt>Kontak</dt>
	<dd><?php echo $user->user_telepon;?></dd>
	<dt>Keterangan</dt>
	<dd><?php echo $row->trans_keterangan;?></dd>
</dl>
</div>
<div class="col-md-5">
	<?php if($row->trans_status == Transaksi::STATUS_ADDED):?>
		<p><small>Pesanan anda telah tercatat didalam sistem, mohon untuk tidak mengirimkan pembayaran apapun sebelum pesanan ini dikonfimasi oleh petugas kami.</small></p>
	<?php endif;?>
	<?php if($row->trans_status == Transaksi::STATUS_APPROVED):?>
		<p><small>Pesanan anda telah kami terima, anda dipersilahkan untuk membayar dengan jumlah total seperti tercantum diatas melalui nomor rekening yang telah dikirimkan via email.</small></p>
		<a class="btn btn-primary btn-lg btn-block tombol" href="<?php echo $this->createUrl('pengaturan/konfirmasipembayaran',array('kodetrans'=>$row->trans_kodetrans));?>">Konfirmasi Pembayaran</a>
	<?php endif;?>
</div>
</div>
</div>
