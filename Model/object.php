<?php
    class product{
        public $id;
        public $cat;
        public $brand;
        public $title;
        public $price;
        public $desc;
        public $image;
        public $keyword;
        

        public function __construct($id,$cat,$brand,$title,$price,$desc,$image,$keyword){
            $this->id=$id;
            $this->cat=$cat;
            $this->brand=$brand;
            $this->title=$title;
            $this->price=$price;
            $this->desc=$desc;
            $this->image=$image;
            $this->keyword=$keyword;
        }
    }

    class utility_register{
        // kiểm tra chuỗi rỗng
        public function validateFill($name){
            if(strlen($name) == 0)
                return false;
            return true;
        }

        // kiểm tra kí tự chuỗi từ a-z hoặc có rỗng
        public function validateName($name){
            $name = strtolower($name);
            for($i=0;$i<strlen($name);$i++){
                if(!($name[$i]>='a'&&$name[$i]<='z' ||$name[$i]=='')){
                    return false;
                }
            }
            return true;
        }
        // chuẩn hóa chữ cái
        public function validateName_Upper($name){
            for($i=strlen($name);$i>=0;$i--){
                if($name[$i]==' '){
                    strtoupper($name[$i-1]);
                }
                if($i==0){
                    strtoupper($name[$i]);
                }
            }
        }

        // kiểm tra email hợp lệ phải có @
        public function validateMail($mail){
            $count = 0;
            for ($i = 0; $i < strlen($mail); $i++){
                if($mail[$i] == "@"){
                    $count++;
                }
            }
            return ($count == 1);
        }

        // Mobile gồm 10 ký tự và bắt đầu bằng ký tự "0"
        public function validateMobile($mobile){
            if(strlen($mobile) == 10){
                if($mobile[0] == "0"){
                    return true;
                }
                return false;
            }
        }

        // Password phải có độ dài lớn hơn hoặc bằng 6.
        public function validateLengthPassword($password){
            if(strlen($password) >= 6){
                return true;
            }
            else{
                return false;
            }
        }

        // Password phải chứa ít nhất 1 ký tự in hoa.
        public function validateLowerPassword($password){
            $count = 0;
            for ($i = 0; $i < strlen($password); $i++){
                if(!(($password[$i] == 'Z') || ($password[$i] == 'X')|| ($password[$i] == 'C')|| ($password[$i] == 'V')|| ($password[$i] == 'B')|| ($password[$i] == 'N')|| ($password[$i] == 'M')|| ($password[$i] == 'A')|| ($password[$i] == 'S')|| ($password[$i] == 'D')|| ($password[$i] == 'F')|| ($password[$i] == 'G')|| ($password[$i] == 'H')|| ($password[$i] == 'J')|| ($password[$i] == 'K')|| ($password[$i] == 'L')|| ($password[$i] == 'Q')|| ($password[$i] == 'W')|| ($password[$i] == 'E')|| ($password[$i] == 'R')|| ($password[$i] == 'T')|| ($password[$i] == 'Y')|| ($password[$i] == 'U')|| ($password[$i] == 'I')|| ($password[$i] == 'O')|| ($password[$i] == 'P'))){
                    $count++;
                }
                else{
                    return true;
                    break;
                }
            }
            if($count==(strlen($password)-1)){
                return false;
            }
        }

        // Password phải chứa ít nhất 1 ký tự đặc biệt.
        public function validateSpecialPassword($password){
            $count = 0;
            for ($i = 0; $i < strlen($password); $i++){
                if(($password[$i]=='!')||($password[$i]=='@')||($password[$i]=='#')||($password[$i]=='$')||($password[$i]=='%')||($password[$i]=='^')||($password[$i]=='&')||($password[$i]=='*')){
                    return true;
                    break;
                }
                else{
                    $count++;
                }
            }
            if($count==strlen($password)-1){
                return false;
            }
        }

        /*public function validatePassword($password){
            if(validateLengthPassword($password)==true && validateLowerPassword($password)==true && validateSpecialPassword($password)==true){
                return true;
            }
            return false;
        }*/
    }

    class register extends utility_register{
        public $fname;
        public $lname;
        public $email;
        public $pass;
        public $mobile;
        public $address1;
        public $address2;

        public function __construct($fname,$lname,$email,$pass,$mobile,$address1,$address2){
            $this->fname = $fname;
            $this->lname = $lname;
            $this->email = $email;
            $this->pass = $pass;
            $this->mobile = $mobile;
            $this->address1 = $address1;
            $this->address2 = $address2;
        }

        public function get_fname(){
            return $this->fname;
        }

        public function get_lname(){
            return $this->lname;
        }

        public function get_email(){
            return $this->email;
        }

        public function get_pass(){
            return $this->pass;
        }

        public function get_mobile(){
            return $this->mobile;
        }

        public function get_address1(){
            return $this->address1;
        }

        public function get_address2(){
            return $this->address2;
        }

        public function error_register($fname,$lname,$email,$pass,$mobile){
            $title= 'Please fill all the fields';
            $dbase = new database();
            $db = $dbase->_connect();
            //Kiểm tra nếu để trống báo lỗi
            if((parent::validateFill($fname)==false)||(parent::validateFill($lname)==false)||(parent::validateFill($email)==false)||(parent::validateFill($pass)==false)||(parent::validateFill($mobile)==false)){
                return $title;
            }

            //Kiểm tra firstname
            if((parent::validateName($fname)==false)){
                return $fname.' is not a name valid';
            }

            //Kiểm tra lastname
            if((parent::validateName($lname)==false)){
                return $lname.' is not a name valid';
            }

            //Kiểm tra email
            if((parent::validateMail($email)==false)){
                return $email.' is not @ a name valid';
            }

            //Kiểm tra mật khẩu
            if((parent::validateLengthPassword($pass)==false)||(parent::validateSpecialPassword($pass)==false)||(parent::validateLowerPassword($pass)==false)){
                return '
                Password needs a special character and a capital letter and password length must be over 6 characters';
            }

            //Kiểm tra số điện thoại
            if((parent::validateMobile($mobile)==false)){
                return 'Phone numbers start with 0 and have 10 numbers';
            }

            //Kiểm tra email có tồn tại chưa
            if(($dbase->isset_email($db,$email))==true){
                return 'Email already exists';
            }

            else{
                return 'Success';
            }
        }
    }

    class login{
        private $email;
        private $pass;

        public function __construct($email,$pass){
            $this->email=$email;
            $this->pass=$pass;
        }

        public function get_email(){
            return $this->email;
        }

        public function get_pass(){
            return $this->pass;
        }
    }
?>