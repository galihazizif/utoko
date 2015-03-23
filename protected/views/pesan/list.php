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
		baseRemoveUrl: "<?php echo $this->createAbsoluteUrl('pesan/delete');?>",
		baseReplyUrl: "<?php echo $this->createAbsoluteUrl('pesan/balas');?>",
		buildMessage : function(message){
			var information;
			information = "<h5><strong>"+message.pesan_judul+"</strong></h5>";
			information+= "<p>"+message.pesan_origination+"</p>";
			information+= "<p>"+message.pesan_tanggal+"</p>";
			information+= "<p>"+message.pesan_isi+"</p>";
			information+= "<div class='row'><div class='col-md-12'><button id='hapuspesan' data-url='"+message.pesan_id+"' type='button' class='btn btn-xs btn-danger'>Hapus</button></div></div>";
			return information;
		},
		cleanMessageScr : function(){
			$('#msg-viewer').html('<h2 id="loading" style="text-align: center; color: #b4b4b4">Tidak ada pesan yang dipilih.</h2>');
		},
		removeMsgItem : function(id){
			$(id).remove();
		},

		replyForm : function(destination){
			var text;
			text = '<hr>';
			text+= '<p>Balas pesan</p>';
			text+= '<form>';
			text+= '<div class="row"><div class="form-group col-md-7"><small>Judul</small><input type="text" placeholder="Judul" name="Pesan[pesan_judul]" id="pesan_judul" class="form-control"></div></div>';
			text+= '<div class="row"><div class="form-group col-md-8"><small>Pesan</small><textarea rows="4" placeholder="Tuliskan pesan balasan anda disini" id="pesan_isi" name="Pesan[pesan_isi]" class="form-control"></textarea></div></div>';
			text+= '<div class="row"><div class="form-group col-md-7"><button id="balaspesan" type="button" class="btn btn-primary">Balas</button></div></div>';
			text+= '<input type="hidden" name="Pesan[pesan_destination]" value="'+destination+'">';
			text+= '</form>';
			return text;
		}
	}

	document.addEventListener('DOMContentLoaded',function(){
		$('.msg-list-item').click(function(){
			$('#msg-viewer').html('<h2 id="loading" style="text-align: center; color: #b4b4b4">Sedang Memuat . . .</h2>');
			$.getJSON(msg.baseUrl+'/'+this.id,function(data){
				$('#msg-viewer').html(msg.buildMessage(data)+msg.replyForm(data.pesan_origination_id));
				$('#'+data.pesan_id).addClass('read');
				$('#hapuspesan').click(function(){
					if(!confirm('Yakin?'))
						return false;
					$('#msg-viewer').html('<h2 id="loading" style="text-align: center; color: #b4b4b4">Sedang Memproses</h2>');
					var id = $(this).attr('data-url');
					$.getJSON(msg.baseRemoveUrl+'/'+id,function(data){
						if(data.status == 'OK'){
							msg.cleanMessageScr();
							msg.removeMsgItem('#'+id);
						}
					})
				});
				$('#balaspesan').click(function(){
					if($('#pesan_judul').val().trim() == '' || $('#pesan_isi').val().trim() == ''){
						alert('Belum diisi.'); return false;
					}
					balasan = $(this).parent().parent().parent().serialize();
					$('#msg-viewer').html('<h2 id="loading" style="text-align: center; color: #b4b4b4">Sedang Memproses</h2>');
					var kirim = $.post(msg.baseReplyUrl,balasan);
					kirim.done(function(data){
						if(data.status == 'OK'){
							$('#msg-viewer').html('<h2 id="loading" style="text-align: center; color: #b4b4b4">Pesan telah terkirim</h2>');
						}else{
							alert('Gagal');
						}
					});
				});
			});
			$('.msg-list-item').removeClass('active');
			$(this).addClass('active');
		});

	});
</script>