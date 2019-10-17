<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>OnlineShopping</title>
	<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css" />
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles.css">

</head>

<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
			<!-- Trở về trang chủ -->
				<a href="./controller.php" class="navbar-brand">OnlineShopping</a>
			</div>

			<ul class="nav navbar-nav">
				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search" name="">
				</li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn" name=""><span
							class='glyphicon glyphicon-search'></span></button></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li id='shoppingcart'><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
							class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge">0</span> </a>
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class="panel-heading">				
								<div class="row">
									<div class="col-md-3">S. No.</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $</div>
								</div>
							</div>
							<div class="panel-body"></div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<?php
					for($i=0;$i<1;$i++){
						
						if(isset($_SESSION['email'])){
							echo '<li><a href="?click_user" ><span class="glyphicon glyphicon-user" ></span> hello '.$_SESSION['email'].'</a>';
							echo '<li><a href="?exit"><span class="glyphicon glyphicon-off"></span> Exit</a></li>';
							break;
						}
						if(isset($_SESSION['email_register'])){
							echo '<li><a href="?click_user" ><span class="glyphicon glyphicon-user" ></span> hello '.$_SESSION['email_register'].'</a>';
							echo '<li><a href="?exit"><span class="glyphicon glyphicon-off"></span> Exit</a></li>';
							break;
						}
						else{
							echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
							class="glyphicon glyphicon-user"></span>Sign In</a>
							<ul class="dropdown-menu">
						<div style="width: 300px;">
						<form action="" method="post">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="login_email">
									<label for="email">Password</label>
									<input type="password" class="form-control" id="password" name="login_pass">
									<p><br></p>
									<a href="#" style="color: white;list-style-type: none;">Forgot Password?</a>
									<input type="submit" class="btn btn-success" style="float: right;bottom:12px;"
										id="login" value="Login" name="login">
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
						</form>
						</div>
					</ul>

				<li><a href="View/register.php">Sign Up</a></li>';					
						}
					}
				?>
				
			</ul>
		</div>
	</div>
	<br><br><br>
	<!-- Slider Begins -->

	<div class="one-time">
		<div><img src="assets/images/car1.jpg"></div>
		<div><img src="assets/images/car2.jpg"></div>
		<div><img src="assets/images/car3.jpg"></div>
	</div>

	<!-- Slider ends -->

	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_cat"></div>
				<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<?php
					//Load categories từ database lên
					foreach ($categories as $key1 => $value1) {
						echo '<li><a href="?categories='.$key1.'">'.$value1.'</a></li>';
					}
					?>
				</div>
				<div id="get_brand"></div>
				<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brands</h4></a></li>
					<?php
					//Load brands từ database lên
					foreach ($brand as $key2 => $value2) {
						echo '<li><a href="?brand='.$key2.'">'.$value2.'</a></li>';
					}
					?>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12" id="cartmsg">

					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading text-center">--Featured Products--
						<div class='pull-right'>
							Sort: &nbsp;&nbsp;&nbsp;<a href="?price_up"id='price_sort'>Price<span class="glyphicon glyphicon-arrow-up" ></a> | <a href="?price_down"
								id='pop_sort'>Price<span class="glyphicon glyphicon-arrow-down"></span></a>
						</div>
					</div>
					<div class="panel-body">
						<div id="get_product"></div>
						<?php

						// Chạy dòng for để khi tới điều kiện đúng thì thực thi lệnh bên trong rồi thoát ra tiếp tục chương trình
						for($i=0;$i<1;$i++){
							// Load categories theo id_categories
							if(isset($_GET['categories'])){
								for($i=0;$i<count($product);$i++){
									if($_GET['categories']==$product[$i]->cat){
										include "product.php";
									}
								}
								break;
							}

						// Load categories theo id_brand
							if(isset($_GET['brand'])){
								for($i=0;$i<count($product);$i++){
									if($_GET['brand']==$product[$i]->brand){
										include "product.php";
									}
								}
								break;
							}

						// Load product
							else{
								for($i=0;$i<count($product);$i++){
									include "product.php";
								}
								break;
							}
						}
							?>				
						
					</div>
					<div class="panel-footer">Ngày hiện tại:
						<?php
						// Hiện ngày/tháng/năm
							$date = getdate();
							echo $date['mday']." / ".$date['mon']." / ".$date['year'];
						?>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class='pagination' id='pageno'>

					</ul>
				</center>
			</div>

			<!-- Modal -->

			<div class="modal fade" id="prod_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Product Details</h4>
						</div>
						<div class="modal-body" id='dynamic_content'>
							...
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

						</div>
					</div>
				</div>
			</div>

			<!-- Modal ends-->
		</div>
	</div>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</body>

<div class="foot">
	<footer>
		<p>Brought To You By <a href="https://code-projects.org/">Billy_NguyenVietHan</a></p>
	</footer>
</div>
<style>
	.foot {
		text-align: center;
	}
</style>

</html>