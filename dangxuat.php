<?php
session_start();
if(isset($_SESSION['userID'])){
    unset($_SESSION['userID']);
}

?>
<a href="index.php">HOME</a>