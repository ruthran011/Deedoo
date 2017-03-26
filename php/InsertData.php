<?php

//    ini_set('display_errors', 1);
//    ini_set('log_errors',1);
//    ini_set('error_log', dirname(__FILE__).'/log.txt');
//    error_reporting(E_ALL);

    $servername = "localhost";
    $username = "root";
    $password = "ruthran011";
    $dbname = "Deedoo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["uni_name"]) && isset($_POST["uni_username"]) && isset($_POST["email"]) && isset($_POST["pw"])){

        $uni_name = ($_POST["uni_name"]);
        $uni_username = $_POST["uni_username"];
        $email = $_POST["email"];
        $pw = $_POST["pw"];

        $post = array($_POST);
        $new_data = array();

        foreach($post[0] as $x => $x_value) {
            if($x_value!=''){
                array_push($new_data, $x, $x_value);
            }
        }

        $faculty = array();
        $department = array();
        $module = array();

        for ($x=0; $x < count($new_data); $x+=2){
            if(strpos($new_data[$x], 'faculty') !== false){
                array_push($faculty, $new_data[$x+1]);
            }elseif (strpos($new_data[$x], 'department') !== false){
                array_push($department, $new_data[$x+1]);
            }elseif (strpos($new_data[$x], 'module') !== false){
                array_push($module, $new_data[$x+1]);
            }
        }

        $sql = "INSERT INTO University (Uni_name , University_un, University_email, pw)
                VALUES ('$uni_name', '$uni_username', '$email', '$pw')";

        $conn->query($sql);

        if(count($faculty)>0){
            for ($x=0; $x < count($faculty); $x++){
                $sql = "INSERT INTO Faculty (university_un, faculty) VALUES ('$uni_username', '$faculty[$x]')";
                $conn->query($sql);
            }
        }

        if(count($department)>0){
            for ($x=0; $x < count($department); $x++){
                $sql = "INSERT INTO Department (university_un, department) VALUES ('$uni_username', '$department[$x]')";
                $conn->query($sql);
            }
        }

        if(count($module)>0){
            for ($x=0; $x < count($module); $x++){
                $sql = "INSERT INTO Module (university_un, module) VALUES ('$uni_username', '$module[$x]')";
                $conn->query($sql);
            }
        }

        header("location:http://localhost/Deedoo/html/SignIn_page.html");

    }

    elseif (isset($_POST['lec_name']) && $_POST['profession'] && $_POST['contact_no'] && $_POST['lec_username'] &&
            $_POST['pw'] && $_POST['lec_email']){

        $lec_name = ($_POST["lec_name"]);
        $profession = $_POST["profession"];
        $contact_no = $_POST["contact_no"];
        $lec_username = $_POST["lec_username"];
        $lec_pw = $_POST["pw"];
        $lec_email = $_POST["lec_email"];

        $sql = "INSERT INTO Lecturer (Name , Profession, Contact_no, user_name, password, email)
                VALUES ('$lec_name','$profession', '$contact_no', '$lec_username', '$lec_pw', '$lec_email')";
        $conn->query($sql);

        header("location:http://localhost/Deedoo/html/SignIn_page.html");

    }

    elseif (isset($_POST['stu_name']) && $_POST['Contact_no'] && $_POST['stu_username'] && $_POST['pw'] &&
            $_POST['stu_email']){

        $stu_name = ($_POST["stu_name"]);
        $stu_username = $_POST["stu_username"];
        $stu_pw = $_POST["pw"];
        $stu_email = $_POST["stu_email"];
        $contact_no = $_POST["Contact_no"];

        $sql = "INSERT INTO Student (Name , user_name, password, email, Contact_no)
                VALUES ('$stu_name', '$stu_username', '$stu_pw', '$stu_email', '$contact_no')";
        $conn->query($sql);

        header("location:http://localhost/Deedoo/html/SignIn_page.html");

    }

    $conn->close();
