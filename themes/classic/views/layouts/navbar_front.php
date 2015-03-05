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
				<form class="navbar-form navbar-right">
					<div class="form-group">
						<div class="input-group">
							<input type="text" style="width: 250px" placeholder="Cari" class="form-control">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Cari</button>
								<div class="btn-group">
								<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang <span class="badge">4</span></button>
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
