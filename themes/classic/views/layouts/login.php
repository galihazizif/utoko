<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->baseUrl;?>/public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo Yii::app()->baseUrl;?>/public/css/signin.css" rel="stylesheet">
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded',function(){
          $('#main').show(1200);
        })
    </script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div id="main" style="display:none" class="container">

    <?php echo $content;?>

    </div> <!-- /container -->
  </body>
</html>
