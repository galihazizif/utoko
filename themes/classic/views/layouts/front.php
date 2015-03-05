<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title><?php echo $this->pageTitle;?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/css/override.css">
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
        })
    </script>
</head>
<body role="document">
<?php $this->renderPartial('/layouts/navbar_front');?>
	<div class="container fixed-fixed" id="main" style="display:none" role="main">
		<div class="row">
			<div class="col-md-4">
			<div class="alert headerbar"><p class="justify">
			<img class="img-circle logo pull-left" src="<?php echo Yii::app()->baseUrl;?>/data/static/logo.png">
			<h4><strong>uToko</strong></h4>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<hr>
			<address><strong>ZZ Dev</strong><small><p>Jalan Jaswadi, Babakan 09/02 Kalimanah Purbalingga<br>
			Tel: 0896 0753 5585
			</p>
			</small></address>
			</div>
			<div class="col-md-12 alert headerbar"><span class="glyphicon glyphicon-menu-right pull-right"></span> 
			Berita</div>
			<h5><strong>Wedhus gembel news</strong></h5>
			<p class="justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <a class="btn btn-info btn-xs" href="#">Selengkapnya</a>
			</p>
			<h5><strong>Wedhus gembel news</strong></h5>
			<p class="justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <a class="btn btn-info btn-xs" href="#">Selengkapnya</a>
			</p>
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

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/js/bootstrap.min.js"></script>
</body>
</html>