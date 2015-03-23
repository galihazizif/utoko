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
          $('#visitorsidebar').children().click(function(){
          	$('#main').hide();
          });
        })
    </script>
</head>
<body role="document">
	<?php $this->renderPartial('/layouts/navbar_front');?>
	<div id="main" style="display:none" class="container fixed-fixed" role="main">
		<div class="row">
			<div class="col-md-3">
				<?php $this->renderPartial('/layouts/_sidebar_pengaturan_visitor');?>
			</div>	
			<div class="col-md-9">
			 <?php
              if(isset($this->breadcrumbs)){
                $this->widget('zii.widgets.CBreadcrumbs', array(
                 'links'=>$this->breadcrumbs,
                 'htmlOptions'=>array('class'=>'breadcrumbs'),
                 'tagName'=>'div',
                 'homeLink'=>'<a class="tombol" href="'.$this->createUrl('pengaturan/index').'">Control Panel</a>',
                 ));
              }
              ?>
			<?php echo $content;?>
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