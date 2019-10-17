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
            </div>
            <ul class="nav navbar-nav navbar-right">
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
							</div>
							<div class="panel-body"></div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
                <?php
                    if(isset($_SESSION['email'])){
                        echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user">'.$_SESSION['email'].'</span></a>';
                    }
                ?>
					<ul class="dropdown-menu">
					<div style="width: 300px;">
					</div>
				</ul>
			</ul>

        </div>
    </div>
    <p><br><br></p>
    <p><br><br></p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="err_msg"></div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Change password</div>
                    <div class="panel-body">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="f_name">Re-enter your old password</label>
                                    <input type="password" id="f_name" name="change_pass1" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="f_name">New password</label>
                                    <input type="password" id="l_name" name="change_pass2" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="mobile">Re-enter new password</label>
                                    <input type="password" id="mobile" name="change_pass3" class="form-control">
                                </div>
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Change" name="change_password" id="signup_btn">
                                </div>
                            </div>
                    </div>
                </div>
                </form>
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
    </footer>
</div>
<style>
    .foot {
        text-align: center;
    }
</style>

</html>