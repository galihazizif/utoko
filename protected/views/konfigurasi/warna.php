<?php
/* @var $this KonfigurasiController */

$this->breadcrumbs=array(
	'Konfigurasi',
);
?>
<h5>Atur skema warna dan latar toko online anda agar sesuai dengan ciri khas produk yang anda jual</h5>
<form method="POST">
<div class="form-group col-md-3">
<label></label>
<div class="input-group cp">
	<input id="" type="input" value="#ffffff" class="colorpicker form-control">	
	<span class="input-group-addon"><i></i></span>
</div>
</div>
<div class="input-group cp">
	<input id="" type="input" value="#ffffff" class="colorpicker form-control">	
	<span class="input-group-addon"><i></i></span>
</div>
</form>

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded',function(){
		$('.cp').colorpicker();
	});
</script>