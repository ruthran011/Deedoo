<?php
$servername = "localhost";
$username = "root";
$password = "ruthran011";
$dbname = "Deedoo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Lecturer (Name , Profession, University, Faculty, Department, Subject, Contact_no, user_name, password, email)
VALUES ('John', 'ff', 'Doe', 'Doe', 'Doe', 'Doe', 345666, 'hkhkjhkjff', 'Doe', 'Doe')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>