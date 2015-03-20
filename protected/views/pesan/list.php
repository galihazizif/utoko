<?php
/* @var $this PesanController */

$this->breadcrumbs=array(
	'Pesan'=>array('/pesan'),
	'List',
);
?>
<h4>Daftar Pesan yang masuk</h4>
<div class="msg-list-container col-md-3">
<?php foreach($pesan as $item):?>
	<?php $read = ($item->pesan_status == Pesan::STATUS_READ)? 'read': '';?>
	<div id="<?php echo $item->pesan_id;?>" class="row msg-list-item <?php echo $read; ?> "> 
		<p>
			<small>
				<?php echo TextHelper::tanggal($item->pesan_tanggal), ' ',substr($item->pesan_judul,0,50);?>

			</small>
		</p>
	</div>
<?php endforeach;?>
</div>
<div id="msg-viewer" class="col-md-8 msg-viewer">
<h2 id="noneselected" style="text-align: center; color: #b4b4b4">Tidak ada pesan yang dipilih</h2>
	
</div>

<script>

	var msg = {
		baseUrl: "<?php echo $this->createAbsoluteUrl('pesan/detail');?>",
		buildMessage : function(message){
			var information;
			information = "<h5><strong>"+message.pesan_judul+"</strong></h5>";
			information+= "<p>"+message.pesan_origination+"</p>";
			information+= "<p>"+message.pesan_tanggal+"</p>";
			information+= "<p>"+message.pesan_isi+"</p>";
			return information;
		},
	}

	document.addEventListener('DOMContentLoaded',function(){
		$('.msg-list-item').click(function(){
			$('#msg-viewer').html('<h2 id="loading" style="text-align: center; color: #b4b4b4">Sedang Memuat . . .</h2>');
			$.getJSON(msg.baseUrl+'/'+this.id,function(data){
				$('#msg-viewer').html(msg.buildMessage(data));
				$('#'+data.pesan_id).addClass('read');
			});
			$('.msg-list-item').removeClass('active');
			$(this).addClass('active');
		});
	});
</script>