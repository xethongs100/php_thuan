<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>OnlineShopping</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script>
		function calculate(){
		var soluong,tien,result,i=0;
		var ttien=0;
		
		do
		{
			var total=0;
			tien = document.getElementById('k' + i);
			soluong = document.getElementById('v' + i);
			result = document.getElementById('result' + i);
			var tongtien = document.getElementById('tongtien');
			total = tien.value * soluong.value;
			ttien = ttien + total;
			result.value=total;
			tongtien.value = ttien;
			i++;
		}while(i<100);
		
	}
	</script>
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="./controller.php" class="navbar-brand">OnlineShopping</a>
			</div>


		</div>
	</div>
	<p><br><br></p>
	<p><br><br></p>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div class="row">
				<div class="col-md-12" id="cart_msg"></div>
			</div>
				<div class="panel panel-primary text-center">
					<div class="panel-heading">Cart Checkout</div>
					<div class="panel-body"></div>
					<div class="row">
						<div class="col-md-2"><b>Action</b></div>
						<div class="col-md-2"><b>Product Image</b></div>
						<div class="col-md-2"><b>Product Name</b></div>
						<div class="col-md-2"><b>Product Price</b></div>
						<div class="col-md-2"><b>Quantity</b></div>
						<div class="col-md-2"><b>Price in $</b></div>
					</div>
					<br><br>
					<div id='cartdetail'>
					<?php
                        $i=0;
                    foreach ($_SESSION['product'] as $key => $value) {
                        if(isset($value['image']) && isset($value['price']) && isset($value['price'])){
                            echo
                            '<form action="index.php" method="post"><div class="row">';
                                echo'<div class="col-md-2"><a href="?delete='.$key.'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                </div>';
                                echo '<div class="col-md-2"><img src="assets/prod_images/'.$value['image'].'" style="height:60px; width:60px; margin-bottom:10px;"></div>';
                                echo '<div class="col-md-2">'.$value['name'].'</div>';
                                echo '<div class="col-md-2">'.'<input class="form-control"  type="label"id="k'.$i.'" onkeyup="calculate()" size="10px" name="price" value="'.$value['price'].'">'.'</div>';
                                echo '<div class="col-md-2">'.'<input class="form-control" name="sluong" type="text" size="10px"  value="1" id ="v'.$i.'" onkeyup="calculate()"></div>';
                                //echo '<div class="col-md-2"><label  id="result" onkeyup="calculate()" value="'.$value['price'].'">'.'</label></div>';
                                echo '<div class="col-md-2"><input class="form-control" type="text" name="tien" id="result'.$i.'" onkeyup="calculate()" size="10px" value="'.$value['price'].'"></div>';	
                            echo '</div></form>';
                            $i++;
                        }
                    }
                    
					?>
					</div>
					<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4">
						<?php
						$tien =0;
						foreach ($_SESSION['product'] as $key => $value)
						{
                            if(isset($value['price'])){
                                $tien += $value['price'];
                            }
						}
						if(isset($tien)){
							echo '<b>Total:</b>'.'<input class="form-control" type="text" id="tongtien"  onkeyup="calculate()" size="10px" value="'.$tien.'">';}
						?>
						</div>
					</div>
					<div class="panel-footer">
						
					</div>
				</div>
				
			</div>

			<div class="col-md-2"></div>
			<div class="row">
				<div class="col-md-9"><button name="" style="margin-top:20px;" class='btn btn-success btn-lg pull-right' id='checkout_btn' data-toggle="modal" data-target="#myModal">Checkout</button></div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</body>
<div class="foot"><footer>
<br>
<p>Kmin & Code-Project</p>
</footer></div>
<style> .foot{text-align: center;}
</style>
</html>