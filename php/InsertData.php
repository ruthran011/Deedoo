<?php

//    ini_set('display_errors', 1);
//    ini_set('log_errors',1);
//    ini_set('error_log', dirname(__FILE__).'/log.txt');
//    error_reporting(E_ALL);

    if (isset($_POST["uni_name"]) && isset($_POST["uni_username"]) && isset($_POST["email"]) && isset($_POST["admin_name"]) &&
        isset($_POST["admin_username"]) && isset($_POST["admin_pw"])){

        $uni_name = ($_POST["uni_name"]);
        $uni_username = $_POST["uni_username"];
        $email = $_POST["email"];
        $admin_name = $_POST["admin_name"];
        $admin_username = $_POST["admin_username"];
        $admin_pw = $_POST["admin_pw"];

        $sql = "INSERT INTO University (Uni_name , University_un, University_email, Faculty, Department, Module, Admin_name, Admin_un, Admin_pw)
                VALUES ('$uni_name', '$uni_username', '$email','kk','kk','admin_name', '$admin_name', '$admin_username', '$admin_pw')";
    }

    elseif (isset($_POST['lec_name']) && $_POST['profession'] && $_POST['contact_no'] && $_POST['lec_username'] &&
            $_POST['lec_pw'] && $_POST['lec_email']){

        $lec_name = ($_POST["lec_name"]);
        $profession = $_POST["profession"];
        $contact_no = $_POST["contact_no"];
        $lec_username = $_POST["lec_username"];
        $lec_pw = $_POST["lec_pw"];
        $lec_email = $_POST["lec_email"];

        $sql = "INSERT INTO Lecturer (Name , Profession, University, Faculty, Department, Subject, Contact_no, user_name, password, email)
                VALUES ('$lec_name','$profession','','','','', '$contact_no', '$lec_username', '$lec_pw', '$lec_email')";
    }

    elseif (isset($_POST['stu_name']) && $_POST['index_no'] && $_POST['stu_username'] && $_POST['stu_pw'] &&
            $_POST['stu_email']){

        $stu_name = ($_POST["stu_name"]);
        $stu_username = $_POST["stu_username"];
        $stu_pw = $_POST["stu_pw"];
        $stu_email = $_POST["stu_email"];
        $index_no = $_POST["index_no"];

        $sql = "INSERT INTO Student (Name , University, Faculty, Department, Subject, user_name, password, email, Index_no)
                VALUES ('$stu_name', '', '', '', '', '$stu_username', '$stu_pw', '$stu_email', '$index_no')";
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
