<?php
    session_start();
    require "Model/db.php";
    $dbase = new database();
    $db = $dbase->_connect();
    $query = "SELECT * FROM products";
    $query1= "SELECT * FROM categories";
    $query2 = "SELECT * FROM brands";
    $product = $dbase->_get_list_product($query,$db);
    $categories = $dbase->_get_list_categories($query1,$db);
    $brand = $dbase->_get_list_brands($query2,$db);
    for($i=0;$i<1;$i++){
        if(isset($_POST['login'])){
            $_SESSION['email']=$_POST['login_email'];
            $pass= md5($_POST['login_pass']);
            if($dbase->login($db,$_SESSION['email'],$pass)==true||($_SESSION['email']=='admin@123'&&$_POST['login_pass']=='123')){
                if($_SESSION['email']=='admin@123'){
                    echo '<script>alert("Login success welcom admin");</script>';
                    $user = $dbase->_get_list_user($db);
                    require "View/admin.php";
                    break;
                }
                else{
                    echo '<script>alert("Login success");</script>';
                    require "View/index.php";
                    break;
                }
            }
            else{
                echo '<script>alert("Login fail");</script>';
                unset($_SESSION['email']);
                require "View/index.php";
                break;
            }
        }

        if(isset($_GET['exit'])){
            unset($_SESSION['email']);
            require "View/index.php";
            break;
        }

        if(isset($_GET['click_user'])){
            $arr_user= $dbase->profile_user($db,$_SESSION['email']);
            require "View/user.php";
            break;
        }

        if(isset($_GET['exit_user'])){
            unset($_SESSION['email']);
            require "View/index.php";
            break;
        }

        if(isset($_POST['edit_profile'])){
            $dbase->change_profile($db,$_SESSION['email'],$_POST['change_f_name'],$_POST['change_l_name'],$_POST['change_mobile'],$_POST['change_address1'],$_POST['change_address2']);
            echo '<script>alert("Change success");</script>';
            $arr_user= $dbase->profile_user($db,$_SESSION['email']);
            require "View/user.php";
            break;
        }

        if(isset($_POST['change_pass'])){
            require "View/change_pass.php";
            break;
        }

        if(isset($_POST['change_password'])){
            $mk1 = md5($_POST['change_pass1']);
            if($dbase->check_pass($db,$_SESSION['email'],$mk1)==true){
                if($_POST['change_pass2']==$_POST['change_pass3']){
                    $mk2 = md5($_POST['change_pass2']);
                    $arr_user= $dbase->profile_user($db,$_SESSION['email']);
                    $dbase->change_password($db,$_SESSION['email'],$mk2);
                    echo '<script>alert("Change password success");</script>';
                    require "View/user.php";
                    break;
                }
                else{
                    echo '<script>alert("The new password does not match");</script>';
                    require "View/change_pass.php";
                    break;
                }
            }
            else{
                echo '<script>alert("Wrong old password");</script>';
                require "View/change_pass.php";
                break;
            }
        }

        if(isset($_GET['delete_user'])){
            $dbase->delete_user($db,$_GET['delete_user']);
            $user = $dbase->_get_list_user($db);
            require "View/admin.php";
            break;
        }

        if(isset($_POST['exit_admin'])){
            unset($_SESSION['email']);
            unset($_SESSION['email_register']);
            require "View/index.php";
            break;
        }

        if(isset($_GET['change_user'])){
            $arr_user= $dbase->admin_edit_user($db,$_GET['change_user']);
            $_SESSION['admin_change_user'] = $_GET['change_user'];
            require "View/edit_user.php";
            break;
        }

        if(isset($_POST['admin_edit_user'])){
            $dbase->change_profile($db,$_POST['edit_email_admin'],$_POST['edit_f_name_admin'],$_POST['edit_l_name_admin'],$_POST['edit_mobile_admin'],$_POST['edit_address1_admin'],$_POST['edit_address2_admin']);
            echo '<script>alert("Change success");</script>';
            $user = $dbase->_get_list_user($db);
            require "View/admin.php";
            break;
        }

        if(isset($_POST['add_product'])){
            $id = $_POST['add_product'];
            for($i=0;$i<count($product);$i++){
                if($id==$product[$i]->id){
                    $_SESSION['product'][$product[$i]->id]=array('image'=>$product[$i]->image,'name'=>$product[$i]->title,'price'=>$product[$i]->price);
                }
            }
            include "./View/cart.php";
            break;
        }
        
       
        if(isset($_GET['delete'])){
            foreach ($_SESSION['product'] as $key => $value) {
                if($_GET['delete']==$key)
                {
                    unset($_SESSION['product'][$key]);
                    require ("View/cart.php");
                }
            }
            break;
        }
        
        // chạy trang web
        else{
            require "View/index.php";
            break;
        }
    }
?>