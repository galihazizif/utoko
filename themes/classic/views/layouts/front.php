<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title><?php echo $this->pageTitle;?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/css/override.css">
	<link rel="stylesheet" type="text/css" href="<?php echo CController::createUrl('konfigurasi/overridestyle');?>">
	<link rel="icon" href="<?php echo Yii::app()->baseUrl;?>/data/static/favicon.png">
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
          $('.delete-confirm').click(function(){
          		return confirm('Hapus?');
          });
        })
    </script>
</head>
<body role="document">
<?php $this->renderPartial('/layouts/navbar_front');?>
	<div class="container fixed-fixed" id="main" style="display:none" role="main">
		<div class="row">
			<div class="col-md-4">
			<div class="alert headerbar"><p class="justify">
			<img class="img-thumbnail logo pull-left" src="<?php echo Yii::app()->baseUrl;?>/data/static/logo.png">
			<h4><strong><?php echo $this->vShortName;?></strong></h4>
			<?php echo $this->vDescription;?>
			</div>
			<div class="col-md-12 alert headerbar"><span class="glyphicon glyphicon-menu-right pull-right"></span> 
			Berita</div>
			<?php $this->beginWidget('zii.widgets.CPortlet'); ?>
			<?php 
			$criteria = new CDbCriteria();
			$criteria->order = "artikel_id DESC";
			$criteria->limit = 2;
			$artikels = Artikel::model()->findAll($criteria);
			?>
			<?php foreach($artikels as $artikel):?>
			<h5><strong><?php echo $artikel->artikel_judul?></strong></h5>
			<p class="justify"><?php echo substr($artikel->artikel_isi,0,200);?> <a class="btn btn-info btn-xs tombol" href="<?php echo $this->createUrl('artikel/detail',array('id'=>$artikel->artikel_id));?>">Selengkapnya</a>
			</p>
			<?php endforeach;?>
			<?php $this->endWidget(); ?>
			</div>
			<div class="col-md-8">
			<?php echo $content;?>
			</div>
		</div>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12 footer">
						<small><strong>ZZ Dev &copy; 2015</strong><br>
						Jalan Jaswadi, Babakan 09/02,<br> Kalimanah, Purbalingga 53371 <br>Jawa Tengah, ID
						</small>
					</div>
				</div>
			</div>
		</footer>
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

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/js/bootstrap.min.js"></script>
</body>
</html>