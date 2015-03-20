<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/Product">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title><?php echo $this->pageTitle;?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/css/override.css">
	<link rel="stylesheet" type="text/css" href="<?php echo CController::createUrl('konfigurasi/overridestyle');?>">
	<link rel="icon" href="<?php echo Yii::app()->baseUrl;?>/data/static/favicon.png">
	<!-- Open Graph data -->
	<meta property="og:title" content="<?php echo $this->pageTitle;?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php echo $this->ogUrl;?>" />
	<meta property="og:image" content="<?php echo $this->ogImage;?>" />
	<meta property="og:description" content="<?php echo $this->ogDescription;?>" />
	<meta property="og:site_name" content="<?php echo $this->ogSiteName;?>" />
	<meta property="og:price:amount" content="<?php echo $this->ogPrice;?>" />
	<meta property="og:price:currency" content="IDR" />
	<script type="text/javascript">
        document.addEventListener('DOMContentLoaded',function(){
          $('#main').fadeIn(1000);
          $('#navbarmenu li').click(function(){
          	$('#navbarmenu li').removeClass('active');
          	$(this).addClass('active');
          	$('#main').hide();
          });
          $('.tombol').click(function(){
          	$('#main').hide();
          });
        })
    </script>
</head>
<body role="document">
	<?php $this->renderPartial('/layouts/navbar_front');?>
	<div id="main" style="display:none" class="container fixed-fixed" role="main">
		<div class="row">
			<div class="col-md-7">
			<?php echo $content;?>
			</div>	
			<div class="col-md-4">
			<?php $this->beginWidget('zii.widgets.CPortlet');?>
			<?php
				$criteria = new CDbCriteria;
				$count = Produk::model()->count();
				$criteria->condition = "produk_id != .".(int)trim($_GET['id']);
				$criteria->offset = mt_rand(0,$count-2);
				$criteria->limit = 2;
				$model = Produk::model()->findAll($criteria);
			?>
			<?php foreach($model as $row):?>
				<div class="well">
					<h5><strong><?php echo $row->produk_nama;?></strong> <span class="label label-danger"><?php echo TextHelper::rawToRupiah($row->produk_harga);?></span></h5>
					<p>
					<?php echo TextHelper::image($row->produk_img,'data/images','img-thumbnail pull-left img-list',false);?>
					<?php echo substr($row->produk_deskripsi,0,250);?><br>
					<a class="tombol btn btn-default btn-xs" href="<?php echo $this->createUrl('produk/detail',array('id'=>$row->produk_id));?>">Selengkapnya</a>
					</p>
				</div>
			<?php endforeach;?>
			<?php $this->endWidget();?>
			</div>
		</div>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12 footer">
						<small><strong>AOEUI Dev &copy; 2015</strong><br>
							Jalan Jaswadi, Babakan 09/02,<br> Kalimanah, Purbalingga 53371 <br>Jawa Tengah, ID
						</small>
					</div>
				</div>
			</div>
		</footer>
		<div id="my-modal" class="modal fade">
			<div id="modalcontent" class="modal-dialog">		
			</div>
		</div>
		<?php if(Yii::app()->user->hasFlash('notif')):?>
		<div id="notif" class="rounded">
						<button type="button" class="close"><span>&times;</span></button>
						<p id="notif-inner">
							<?php echo Yii::app()->user->getFlash('notif');?>
						</p>
		</div>
		<script type="text/javascript">
		document.addEventListener('DOMContentLoaded',function(){
			$('.close').click(function(){
				$(this).parent().fadeOut(500);
			});	
		});
		</script>
		<?php endif;?>
	</div>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/js/bootstrap.min.js"></script>
</body>
</html>