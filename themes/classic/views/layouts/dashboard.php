<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?php echo Yii::app()->baseUrl;?>/data/static/favicon.png">

  <title>Control Panel</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo Yii::app()->baseUrl;?>/public/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/public/css/bootstrap-theme.min.css">
  <!-- Custom styles for this template -->
  <link href="<?php echo Yii::app()->baseUrl;?>/public/css/dashboard.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript">
        document.addEventListener('DOMContentLoaded',function(){
          $('#main').slideDown(500);
          $('.tombol').click(function(){
            $('#main').hide();
          });
          $('.delete,.yakin').click(function(){
            return confirm('Yakin?');
          });
        })
      </script>
    </head>

    <body>

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="<?php echo $this->createUrl('front/index'); ?>"><img class="img-navbar pull-left" src="<?php echo Yii::app()->baseUrl.'/data/static/favicon.png';?>"> uToko <small>v<?php echo Yii::app()->params->version;?></small></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">

            <?php
            $this->widget('zii.widgets.CMenu',array(
              'items'=>array(
                array('label'=>'Lihat Website','url'=>array('front/index')),
                ),
              'htmlOptions'=>array('class'=>'nav navbar-nav'),
              ));
              ?>
              <form class="navbar-form navbar-right">
                <div class="btn-group">
                  <button type="button" class="btn btn-default" ><span class="glyphicon glyphicon-user"></span> <?php echo Yii::app()->user->id['user_email'];?>

                  </button>              
                  <a class="btn btn-default" title="Keluar" href="<?php echo $this->createUrl('site/logout');?>"><span class="glyphicon glyphicon-off"></span></a>
                </div>
              </form>
            </div>
          </div>
        </nav>

        <div class="container-fluid">
          <div class="row">

            <div class="col-sm-3 col-md-2 sidebar">
              <?php echo $this->renderPartial('/layouts/_side_dashboard_menu');?>
            </div>

            <div id="main" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="display:none">

              <?php if(Yii::app()->user->hasFlash('notifSuccess') || Yii::app()->user->hasFlash('notifDanger')): ?>
                <script type="text/javascript">
                  document.addEventListener('DOMContentLoaded',function(){
                    $('.alert').delay(5000).hide(500);
                  });

                </script>
              <?php endif;?>
              <?php if(Yii::app()->user->hasFlash('notifSuccess')): ?>
                <div id="alert" class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <p><?php echo Yii::app()->user->getFlash('notifSuccess');?></p>
                </div>
              <?php endif;?>
              <?php if(Yii::app()->user->hasFlash('notifDanger')):?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <p><?php echo Yii::app()->user->getFlash('notifDanger');?></p>
                </div>
              <?php endif;?>
              
              <div class="pull-right">
              <?php
              $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('style'=>''),
                'itemCssClass'=>'btn btn-default btn-sm',
                ));
              ?>
              </div>

              <?php
              if(isset($this->breadcrumbs)){
                $this->widget('zii.widgets.CBreadcrumbs', array(
                 'links'=>$this->breadcrumbs,
                 'htmlOptions'=>array('class'=>'breadcrumbs'),
                 'tagName'=>'div',
                 'homeLink'=>'<a class="tombol" href="'.$this->createUrl('konfigurasi/index').'">Control Panel</a>',
                 ));
              }
              ?>
              <?php echo $content;?>


            </div>
          </div>
        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/public/js/jquery-1.11.2.min.js"></script> 
    <script src="<?php echo Yii::app()->baseUrl;?>/public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded',function(){
        $('#dashboardmenu li').click(function(){
          $('#dashboardmenu li').removeClass('active');
          $(this).addClass('active');
          $('#main').hide();
        });
      });
    </script>
  </body>
  </html>
