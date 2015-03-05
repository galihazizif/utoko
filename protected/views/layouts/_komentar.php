<?php foreach($model as $rowkomentar):?>
	<div id="komentar" class="">
		<div class="komentar-item rounded" >
		<h4><?php echo $rowkomentar->komentar_nama;?> <small> pada <?php echo TextHelper::tanggal($rowkomentar->komentar_tanggal);?></small></h4>
			<p>
				<?php echo $rowkomentar->komentar_isi;?>
			</p>
		</div>

	</div>
	<br>

<?php endforeach;?>