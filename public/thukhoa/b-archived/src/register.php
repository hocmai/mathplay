<?php

file_put_contents("log.txt", "register.php".PHP_EOL, FILE_APPEND | LOCK_EX);

require_once("database.php");

if ($_POST) {
    $name    = '';
    $email   = '';
    $phone   = '';
    $province = '';
    if (isset($_POST['register_name'])) {
        $name = htmlspecialchars((string) $_POST['register_name']);
    }
    $regemail = '/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/';
    if (isset($_POST['register_email'])) {
        preg_match($regemail, $_POST['register_email'], $rese);
        if (!empty($rese)) {
            $email = htmlspecialchars((string) $rese[0]);
        }
    }
    $regphone = '/^[\(\)\s\-\+\d]{10,11}$/';
    if (isset($_POST['register_phone'])) {
        preg_match($regphone, $_POST['register_phone'], $resp);
        if (!empty($resp)) {
            $phone = (string) $resp[0];
        }
    }
    if (isset($_POST['register_province'])) {
        $province = htmlspecialchars((string) $_POST['register_province']);
    }

    file_put_contents("log.txt", "INSERT INTO tbl_contact (fullname, email, phone, province, time_stamp) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', '" . $province . "', now())".PHP_EOL, FILE_APPEND | LOCK_EX);

        
    if (trim($name) != '' && trim($email) != '' && trim($phone) != '' && trim($province) != '') {
        mysql_query("INSERT INTO tbl_contact (fullname, email, phone, province, time_stamp) VALUES ('" . $name . "', '" . $email . "', '" . $phone . "', '" . $province . "', now())");
        header("Location: ../register-succeed.html");
    } else {
        header("Location: ../register-fail.html");
    }
    
} else {
    header("Location: ../register-fail.html");
}