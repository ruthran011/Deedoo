<?php

//    ini_set('display_errors', 1);
//    ini_set('log_errors',1);
//    ini_set('error_log', dirname(__FILE__).'/log.txt');
//    error_reporting(E_ALL);

//    phpinfo();

    $sql = null;

    if (isset($_POST["uni_name"]) && isset($_POST["uni_username"]) && isset($_POST["email"]) && isset($_POST["admin_name"]) &&
        isset($_POST["admin_username"]) && isset($_POST["admin_pw"])){

        $sql = "INSERT INTO University (Uni_name , University_un, University_email, Faculty, Department, Module, Admin_name, Admin_un, Admin_pw)
                VALUES ('hello', 'uni_username', 'email', 'kk','kk','kk','admin_name', 'admin_username', 'admin_pw')";

    }

    elseif (isset($_POST['uni_name']) && $_POST['uni_username'] && $_POST['email'] && $_POST['admin_name'] &&
        $_POST['admin_username'] && $_POST['admin_pw']){

        $sql = "INSERT INTO Lecturer (Name , Profession, University, Faculty, Department, Subject, Contact_no, user_name, password, email)
                VALUES ()";
    }

    elseif (isset($_POST['uni_name']) && $_POST['uni_username'] && $_POST['email'] && $_POST['admin_name'] &&
        $_POST['admin_username'] && $_POST['admin_pw']){

        $sql = "INSERT INTO Lecturer (Name , Profession, University, Faculty, Department, Subject, Contact_no, user_name, password, email)
                VALUES ()";
    }else{

        echo 'ther';
    }

    $servername = "localhost";
    $username = "root";
    $password = "ruthran011";
    $dbname = "Deedoo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
