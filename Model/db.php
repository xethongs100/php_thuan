<?php
    require "object.php";
    class database{
        private $conn;
        function _connect(){
            $conn = mysqli_connect("localhost","root","");
            if(!$conn){
                $error = mysqli_error($conn);
                exit("Ket noi khong thanh cong".$error);
            }
            mysqli_select_db($conn,"onlineshopping");
            return $conn;
        }
        function _get_list_product($query,$db){
            $query_run = mysqli_query($db,$query);
            $product = array();
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC))
            {
                $id  = $row['product_id'];
                $cat = $row['product_cat'];
                $brand = $row['product_brand'];
                $title = $row['product_title'];
                $price = $row['product_price'];
                $desc = $row['product_desc'];
                $image = $row['product_image'];
                $keyword = $row['product_keywords'];
                $products = new product($id,$cat,$brand,$title,$price,$desc,$image,$keyword);
                array_push($product,$products);
            }
            return $product;
        }

        function _get_list_categories($query,$db){
            $query_run = mysqli_query($db,$query);
            $categories = array();
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                $id = $row['cat_id'];
                $title = $row['cat_title'];
                $categories[$id]=$title;
            }
            return $categories;
        }

        function _get_list_brands($query,$db){
            $query_run = mysqli_query($db,$query);
            $brand = array();
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                $id = $row['brand_id'];
                $title = $row['brand_title'];
                $brand[$id]=$title;
            }
            return $brand;
        }

        function isset_email($db,$email){
            $query = "SELECT * FROM user_info";
            $query_run = mysqli_query($db,$query);
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                if($email==$row['email']){
                    return true;
                    break;
                }
            }
            return false;
        }
        
        function insert_register($db,$fname,$lname,$email,$pass,$mobile,$address1,$address2){
            $mk = md5($pass);
            $query = "INSERT INTO user_info VALUES(null,'$fname','$lname','$email','$mk','$mobile','$address1','$address2')";
            $query_run = mysqli_query($db,$query);
        }

        function login($db,$email,$pass){
            $query = "SELECT * FROM user_info";
            $query_run = mysqli_query($db,$query);
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                if($email==$row['email']&&$pass==$row['password']){
                    return true;
                    break;
                }
            }
            return false;
        }

        function profile_user($db,$email){
            $query = "SELECT * FROM user_info";
            $query_run = mysqli_query($db,$query);
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                if($email==$row['email']){
                    $user = array($row['first_name'],$row['last_name'],$row['password'],$row['mobile'],$row['address1'],$row['address2']);
                    return $user;
                    break;
                }
            }
        }

        function change_profile($db,$email,$fname,$lname,$mobile,$address1,$address2){
            $query = "UPDATE user_info SET first_name = '$fname',last_name = '$lname',mobile = '$mobile', address1 = '$address1' , address2 = '$address2' WHERE email = '$email' ";
            $query_run = mysqli_query($db,$query);
        }

        function check_pass($db,$email,$pass){
            $query = "SELECT * FROM user_info";
            $query_run = mysqli_query($db,$query);
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                if($email==$row['email']&&$pass==$row['password']){
                    return true;
                    break;
                }
            }
            return false;
        }

        function change_password($db,$email,$pass){
            $query = "UPDATE user_info SET password = '$pass' WHERE email = '$email'";
            $query_run = mysqli_query($db,$query);
        }

        function _get_list_user($db){
            $query = "SELECT * FROM user_info";
            $query_run = mysqli_query($db,$query);
            $user = array();
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC))
            {
                $fname = $row['first_name'];
                $lname = $row['last_name'];
                $email = $row['email'];
                $pass = $row['password'];
                $mobile = $row['mobile'];
                $address1 = $row['address1'];
                $address2 = $row['address2'];
                $users = new register($fname,$lname,$email,$pass,$mobile,$address1,$address2);
                array_push($user,$users);
            }
            return $user;
        }

        function delete_user($db,$email){
            $query = "DELETE  FROM user_info WHERE email ='$email'";
            $query_run = mysqli_query($db,$query);
        }

        function admin_edit_user($db,$email){
            $query = "SELECT * FROM user_info";
            $query_run = mysqli_query($db,$query);
            while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                if($email==$row['email']){
                    $user = array($row['first_name'],$row['last_name'],$row['password'],$row['mobile'],$row['address1'],$row['address2'],$row['email']);
                    return $user;
                    break;
                }
            }
        }
    }
?>