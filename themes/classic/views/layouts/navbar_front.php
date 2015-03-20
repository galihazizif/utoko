<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="#" class="navbar-brand"><img src="<?php echo Yii::app()->baseUrl;?>/data/static/favicon.png" class="pull-left img-navbar"> uToko</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<form method="GET" action="<?php echo $this->createUrl('front/index');?>" class="navbar-form navbar-right">
					<div class="form-group">
						<div class="input-group">
							<input type="text" style="width: 250px" name="q" placeholder="Cari" value="<?php echo isset($_GET['q'])? trim($_GET['q']): '';?>" class="form-control">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default tombol"><span class="glyphicon glyphicon-search"></span> Cari</button>
								<div class="btn-group">
								<?php if(!Yii::app()->user->isAdmin()):?>
								<a href="<?php echo $this->createUrl('cart/list');?>" class="btn btn-default tombol"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang <span class="badge"><?php echo KeranjangKu::hitungPesanan($_COOKIE['utoko']);?></span></a>
								<?php endif;?>
								<button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class='caret'></span></button>
								<!-- <div class="dropdown"> -->
									<ul class="dropdown-menu" role="menu">
									<li><a href="#">aou</a></li>
									<li><a href="#">aou</a></li>
									</ul>
								<!-- </div> -->
						</div>
							</div>
						</div>
					</div>

				</form>
				<?php $this->renderPartial('/layouts/_front_navbar_menu'); ?>
			</div>
		</div>
	</nav>
