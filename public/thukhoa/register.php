<?php
require_once("db.php");
date_default_timezone_set('Asia/Saigon');
if($_POST){
    $name=''; $email=''; $phone=''; $address='';
   if(isset($_POST['register_name'])){
       $name=(string)$_POST['register_name'];
   }
    $regemail='/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/';
    if(isset($_POST['register_email'])){
        preg_match($regemail,$_POST['register_email'], $rese);
       if(!empty($rese)){
           $email=(string)$rese[0];
       }
    }
    $regphone='/^[\(\)\s\-\+\d]{10,17}$/';
    if(isset($_POST['register_phone'])){
        preg_match($regphone,$_POST['register_phone'], $resp);
        if(!empty($resp)){
            $phone=(string)$resp[0];
        }
    }

    if(isset($_POST['register_address'])){
        $address=(string)$_POST['register_address'];
    }

    if(trim($name)!='' && trim($email)!='' && trim($phone)!='' && trim($address)!=''){
        mysql_query("INSERT INTO tbl_data (name, email, phone,address,created_date) VALUES ('".$name."', '".$email."', '".$phone."','".$address."','".date('Y-m-d H:i:s')."')");
        header("Location: /index.php?register=success");
    }else{
        header("Location: /index.php?register=fail");
    }

}else{
   header("Location: /index.php");
}