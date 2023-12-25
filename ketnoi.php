<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "quan_ly_diem_hs";

$conn = new mysqli($servername, $username,$password,$db);
if($conn -> connect_error){
    die("Connection failed:" . $conn -> connect_error) ;
}

$result = $conn->query("SELECT * FROM diem");
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>