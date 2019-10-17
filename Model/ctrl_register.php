<?php
    include "db.php";
    // lấy dữ liệu từ register
    if(isset($_POST['signup'])){
        //$email = $_POST['email'];
        $register = new register($_POST['f_name'],$_POST['l_name'],$_POST['email'],$_POST['password'],$_POST['mobile'],$_POST['address1'],$_POST['address2']);
        $thongbao = $register->error_register($register->get_fname(),$register->get_lname(),$register->get_email(),$register->get_pass(),$register->get_mobile());
        if($thongbao=='Success'){
            $insert = new database();
            $db = $insert->_connect();
            $insert->insert_register($db,$register->get_fname(),$register->get_lname(),$register->get_email(),$register->get_pass(),$register->get_mobile(),$register->get_address1(),$register->get_address2());
        }
        require '../View/register.php';
    }
?>