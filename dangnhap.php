<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Lý Điểm Học Sinh</title>
    <link href="css\login.css" rel="stylesheet">
    <link rel="stylesheet" href="css\base.css">
</head>
<body> 
<div class="container">
    <h1>Đăng nhập</h1>
    <form action="" method="get">
      <div class="form-group">
        <label for="email">Tên đăng nhập</label>
        <input type="text" id="email" name="UserID" placeholder="Nhập tên đăng nhập của bạn" required>
      </div>
      <div class="form-group">
        <label for="password">Mật Khẩu</label>
        <input type="password" id="password" name="Password" placeholder="Nhập mật khẩu của bạn" required>
      </div>
      <div class="register">
        <a href="dangky.php">Đăng Ký</a>
      </div>
        <button type="submit" class="button" name="login">Đăng Nhập</button>
    </form>
  </div>
  <?php
if (isset($_GET['login'])) {
    require "ketnoi.php";
    $userID = $_GET['UserID'];
    $password = $_GET['Password'];
    mysqli_set_charset($conn, 'UTF8');

    $sql = "SELECT userID, password, 'teacher' as account_type FROM users WHERE userID = '$userID' AND password = '$password'
            UNION
            SELECT userID, password, 'student' as account_type FROM user_hs WHERE userID = '$userID' AND password = '$password'";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
        exit;
    }

    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['userID'] = $row['userID'];

    // Kiểm tra và chuyển hướng dựa trên account_type
    if ($row['account_type'] == 'teacher') {
        header("Location: teacherhome.php");
    } elseif ($row['account_type'] == 'student') {
        header("Location: studenthome.php");
    }
}
?>
</body>
</html>