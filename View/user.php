<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Amaclone</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top" id="topnav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="../controller.php" class="navbar-brand"></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <?php
                if(isset($_SESSION['email'])){
                    echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>'.$_SESSION['email'].'</a></li>';
                }
            ?>
                <li><a href="?exit_user"><span class="glyphicon glyphicon-off"></span>Exit</a></li>
				<ul class="dropdown-menu">
				</ul>
			</ul>
        </div>
    </div>
    <p><br><br></p>
    <p><br></p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="err_msg">
            <?php 
                /*if(isset($thongbao)){
                    echo '<p style="color:red;background:pink; height:40px; padding:10px 15px;">'.$thongbao.'</p>';
                }*/
            ?>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Profile User</div>
                    <div class="panel-body">
                    <?php
                        if(isset($arr_user)){
                            echo'
                        <form method="post" action="./controller.php">
                            <div class="row">
                                    <div class="col-md-12">
    	                                <div class="text-center">
                                        <img src="./View/profile_billy1.jpg" style="width:150px;" class="avatar img-circle img-thumbnail" alt="avatar">
                                        <h5>Photo profile</h5>
                                        </div></hr><br>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="f_name">First Name</label>
                                    <input type="text" id="f_name" name="change_f_name" class="form-control" value="'.$arr_user[0].'"  >
                                </div>
                                <div class="col-md-6">
                                    <label for="f_name">Last Name</label>
                                    <input type="text" id="l_name" name="change_l_name" class="form-control" value="'.$arr_user[1].'" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pass">Password</label>
                                    <input type="password" id="email" name="password_user" class="form-control" value="'.$arr_user[2].'" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" id="mobile" name="change_mobile" class="form-control" value="'.$arr_user[3].'" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">  
                                </div>
                                <div class="col-md-6"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="address1">Address #1</label>
                                    <input type="textarea" id="address1" name="change_address1" class="form-control" value="'.$arr_user[4].'" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="address2">Address #2</label>
                                    <input type="textarea" id="address2" name="change_address2" class="form-control" value="'.$arr_user[5].'" >
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary" value="Edit Personal Information" name="edit_profile" id="signup_btn">
                                    <input type="submit" class="btn btn-primary" value="Change Password" name="change_pass" id="signup_btn">
                                </div>
                            </div>
                    </div>
                    </div>
                    </form>';
                } 
                ?>
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</body>
<div class="foot">
    <footer>
        <p> <?php
            // Hiện ngày/tháng/năm
            $date = getdate();
            echo $date['mday']." / ".$date['mon']." / ".$date['year'];						
		?></p>
    </footer>
</div>
<style>
    .foot {
        text-align: center;
    }
</style>

</html>