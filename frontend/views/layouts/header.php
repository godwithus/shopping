<?php
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\Products;

if(!isset($_SESSION['cart'])) { 
	$_SESSION['cart'] = [];
}

if(!isset($_SESSION['wishlist'])) { 
	$_SESSION['wishlist'] = [];
}

	$carts = Products::find()->where(['id' => $_SESSION['cart']])->count();
	$wishlist = Products::find()->where(['id' => $_SESSION['wishlist']])->count();

	$array = $_SESSION['wishlist'];
	$vals = array_count_values($array);

?>

<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?= Url::to('/')?>"><img src="<?= Url::to('@web/')?>images/home/logo_oo.jpg" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="<?= Url::to('/wishlist/index') ?>"><i class="fa fa-star"></i> Wishlist  <span class="badge" style="background-color: green;"><?= $wishlist; ?></span> </a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="<?= Url::to('/site/cart') ?>"><i class="fa fa-shopping-cart"></i> Carts <span class="badge" style="background-color: red;"><?= $carts; ?></span></a></li>
								
								<?php if(Yii::$app->user->isGuest){ ?>

									<li><a href="<?= Url::to('/site/login') ?>"><i class="fa fa-lock"></i> Login</a></li>
									<li><a href="<?= Url::to('/site/signup') ?>"><i class="fa fa-lock"></i> Sign Up</a></li>

								<?php } else { 
									echo Html::beginForm(['logout'], 'post')
            							 .Html::submitButton(
                						 'Logout (' . Yii::$app->user->identity->username . ')',
                						 ['class' => 'btn btn-link logout'])
										. Html::endForm();
									} 
								?>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->
	