<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>uToko</title>
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
			<div class="well">
			<h4>lorem lorem</h4>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			</div>
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
	</div>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/js/bootstrap.min.js"></script>
</body>
</html>