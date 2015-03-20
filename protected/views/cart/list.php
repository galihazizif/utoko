<?php
/* @var $this CartController */

$this->breadcrumbs=array(
	'Cart'=>array('/cart'),
	'List',
	);

$sum = 0;

$this->pageTitle = 'Keranjang Belanja';
?>
<h3><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang Belanja</h3>

<?php if(count($model) > 0):?>
	<p>
		Berikut ini produk yang telah dimasukan kedalam keranjang belanja Anda.
	</p>
	<table class="table table-condensed table-striped">
		<tr>
			<th>Nama</th><th>Qty</th><th class="align-right">Harga Satuan</th><th class="align-right">Total</th><th class="align-right">...</th>
		</tr>
		<?php foreach ($model as $key => $value):?>
			<tr>
				<?php
				$rowSum = 0;
				$rowSum = $value->keranjangProduk->produk_harga * $value->keranjang_qty;
				$sum = $sum + ($value->keranjangProduk->produk_harga * $value->keranjang_qty);
				?>
				<td>
					<?php echo $value->keranjangProduk->produk_nama;?>
				</td>
				<td>
					<?php echo $value->keranjang_qty;?>
				</td>
				<td class="align-right">
					<?php echo TextHelper::rawToRupiah($value->keranjangProduk->produk_harga);?>
				</td>
				<td class="align-right">
					<?php echo TextHelper::rawToRupiah($rowSum);?>		
				</td>
				<td class="align-right">
					<a class="delete-confirm" href="<?php echo $this->createUrl('cart/delete',array('id'=>$value->keranjang_id));?>"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
		<?php endforeach;?>
		<tr>
			<td class="align-right" colspan="3">
				<strong>Jumlah Total</strong>
			</td>
			<td class="align-right">
				<strong><?php echo TextHelper::rawToRupiah($sum); ?></strong>
			</td>
			<td>
				&nbsp;
			</td>
		</tr>
	</table>
	<?php if(!Yii::app()->user->isVisitor()):?>
		<p>Untuk melakukan Checkout anda harus <a class="tombol" href="<?php echo $this->createUrl('site/login').'?rdr='.base64_encode($this->createUrl('cart/list'));?>">login</a> atau <a class="tombol" href="<?php echo $this->createUrl('site/registrasi').'?rdr='.base64_encode($this->createUrl('cart/list'));?>">mendaftar</a> terlebih dahulu.</p>
	<?php else:?>
		<div class="row">
			<div class="col-md-8">
				<label for="tbl">Informasi Pemesan</label>
				<ul class="list-group">
					<li class="list-group-item">
						<?php echo $visitor->user_nama;?>
					</li>
					<li class="list-group-item">
						<?php echo $visitor->user_telepon;?>
					</li>
					<li class="list-group-item">
						<?php echo $visitor->user_alamat.', '.Lokasi::lokasiLengkap($visitor->user_lokasi);?>
					</li>
				</ul>

				<p>Alamat Pengiriman:</p>
				
				<div class="form-group">
				<label><input type="radio" name="pengiriman" id="pengiriman-default" checked> Gunakan alamat diatas</label><br>
				<label><input type="radio" name="pengiriman" id="pengiriman-lain"> Masukan alamat lain</label>
				</div>

				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'checkout-form',
					'action'=>$this->createUrl('cart/checkout'),
					'htmlOptions'=>array(
						'style'=>'display:none',
						),
					'enableClientValidation'=>false,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,
						),
					)); ?>
					<div class="row">
						<div class="form-group col-md-12">
							<?php echo $form->labelEx($checkoutForm,'provinsi'); ?>
							<?php echo $form->dropDownList($checkoutForm,'provinsi',Lokasi::arrayProvinsi(),array(
								'class'=>'form-control',
								'ajax'=>array(
									'type'=>'GET',
									'url'=>$this->createUrl('lokasi/updateKabupaten'),
									'update'=>'#CheckoutForm_kabupaten',
									),
									)); ?>
									<?php echo $form->error($checkoutForm,'provinsi'); ?>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<?php echo $form->labelEx($checkoutForm,'kabupaten'); ?>
									<?php echo $form->dropDownList($checkoutForm,'kabupaten',$listKabupaten,array(
										'class'=>'form-control',
										'ajax'=>array(
											'type'=>'GET',
											'url'=>$this->createUrl('lokasi/updateKecamatan'),
											'update'=>'#CheckoutForm_kecamatan',
											),
											)); ?>
											<?php echo $form->error($checkoutForm,'kabupaten'); ?>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12">
											<?php echo $form->labelEx($checkoutForm,'kecamatan'); ?>
											<?php echo $form->dropDownList($checkoutForm,'kecamatan',$listKecamatan,array('class'=>'form-control')); ?>
											<?php echo $form->error($checkoutForm,'kecamatan'); ?>
										</div>
									</div>

									<div class="row">
										<div class="form-group col-md-12">
											<?php echo $form->labelEx($checkoutForm,'alamat'); ?>
											<?php echo $form->textArea($checkoutForm,'alamat',array('class'=>'form-control','rows'=>'4','placeholder'=>'Misal: Jalan Galunggung 4, RT 09/ RW 12')); ?>
											<?php echo $form->error($checkoutForm,'alamat'); ?>
										</div>
									</div>
									<button type="submit" id="alamat-lain-btn" class="btn btn-default btn-lg btn-block">
										<span class="glyphicon glyphicon-check"></span> Checkout</a>
									</button>
									<br>
									<?php $this->endWidget();?>
									<a id="default-checkout-button" href="<?php echo $this->createUrl('cart/checkout');?>" class="tombol btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-check
										"></span> Checkout</a>
									</div>
									<div class="col-md-4 well">
										<p class="justify"><h5><strong><u>Perhatian!</u></strong></h5>
											Kami akan mengirimkan pemberitahuan melalui email setelah memeriksa ketersedian produk,<strong><i> jangan melakukan pembayaran apapun</i></strong> sebelum menerima konfirmasi dari kami.
										</p>
									</div>
								</div>
							<?php endif;?>



						<?php else:?>
							Tidak ada produk didalam keranjang belanja anda.
							<br><br><a class="btn btn-lg btn-default tombol" href="<?php echo $this->createUrl('front/index');?>"><span class="glyphicon glyphicon-paperclip"></span> Mulai berbelanja</a>
						<?php endif;?>
						<script>
							document.addEventListener('DOMContentLoaded',function(){
								$('#pengiriman-default').click(function(){
									$('#checkout-form').hide(500);
									$('#default-checkout-button').show(500);
								});
								$('#pengiriman-lain').click(function(){
									$('#checkout-form').show(500);
									$('#default-checkout-button').hide(500);
								});
								$('#alamat-lain-btn').click(function(){
									if($('#CheckoutForm_kecamatan').val() == '' || $('#CheckoutForm_alamat').val() == ''){
										alert('Alamat harus dilengkapi terlebih dahulu.');
										return false;
									}
								});
							});
						</script>