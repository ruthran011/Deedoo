<?php

    $servername = "localhost";
    $username = "root";
    $password = "ruthran011";
    $dbname = "Deedoo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['username']) && isset($_POST['pw'])){

        $uname = $_POST['username'];
        $pw = $_POST['pw'];

        $sql1 = "SELECT User_name, Password FROM Student";
        $result1 = $conn->query($sql1);

        while($row = $result1->fetch_assoc()) {
            if($row['User_name']==$uname && $row['Password']==$pw){
                    header("Location:http://localhost:63342/Deedoo/html/User_profile.html?_ijt=ocqn3j8rd3mr8jg5pqfoipqd0");
                exit();
            }
        }


        $sql2 = "SELECT University_un, pw FROM University";
        $result2 = $conn->query($sql2);

        while($row = $result2->fetch_assoc()) {
            if($row['University_un']==$uname && $row['pw']==$pw){
                header("Location:http://localhost:63342/Deedoo/html/User_profile.html?_ijt=ocqn3j8rd3mr8jg5pqfoipqd0");
                exit();
            }
        }


        $sql3 = "SELECT user_name, password FROM Lecturer";
        $result3 = $conn->query($sql3);

        while($row = $result3->fetch_assoc()) {
            if($row['user_name']==$uname && $row['password']==$pw){
                header("Location:http://localhost:63342/Deedoo/html/User_profile.html?_ijt=ocqn3j8rd3mr8jg5pqfoipqd0");
                exit();
            }
        }
    }


    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pw'])){
        $u_name = $_POST['username'];
        $email = $_POST['email'];
        $pw = $_POST['pw'];

        $sql1 = "SELECT pw FROM University WHERE University_un = '$u_name'";
        $result1 = $conn->query($sql1);

        if($result1->num_rows > 0){
            $sql = "UPDATE University SET Admin_pw = '$pw' WHERE Admin_un = '$u_name'";
            header("Location:http://localhost/Deedoo/html/SignIn_page.html");
            exit();
        }

//        while($row = $result1->fetch_assoc()) {
//            var_dump($row);
//            if($row['University_un']==$u_name && $row['pw']==$pw && $row['University_email']==$email){
//
//            }
//        }

        $sql2 = "SELECT user_name, email, password FROM Lecturer";
        $result2 = $conn->query($sql2);

        while($row = $result2->fetch_assoc()) {
            if($row['user_name']==$u_name && $row['password']==$pw && $row['email']==$email){
                $sql = "UPDATE Lecturer SET password = '$pw' WHERE user_name = '$u_name'";
                header("Location:http://localhost/Deedoo/html/SignIn_page.html");
                exit();
            }
        }

        $sql3 = "SELECT User_name, Email, Password FROM Student";
        $result3 = $conn->query($sql3);

        while($row = $result3->fetch_assoc()) {
            if($row['User_name']==$u_name && $row['Password']==$pw && $row['Email']==$email){
                $sql = "UPDATE University SET Password = '$pw' WHERE User_name = '$u_name'";
                header("Location:http://localhost/Deedoo/html/SignIn_page.html");
                exit();
            }
        }

    }

    $conn->close();
