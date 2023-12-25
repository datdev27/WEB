<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css\register.css" rel="stylesheet">
    <title>Đăng Ký Tài Khoản</title>
</head>
<body>
    <div class="container">
        <h1>Đăng Ký</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Tài khoản</label>
                <input type="text" id="email" name="UserID" placeholder="Nhập UserID của bạn" required>
            </div>
            <div class="form-group">
                <label for="password">Mật Khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu của bạn" required>
            </div>
            <div class="form-group">
                <label for="password_re">Nhập Lại Mật Khẩu</label>
                <input type="password" id="password_re" name="password_re" placeholder="Nhập lại mật khẩu của bạn" required>
            </div>
                <button type="submit" name="submit" class="button">Đăng Ký</button>
    </form>
    </div>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quan_ly_diem_hs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Kiểm tra xem form đã được submit chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form
    $userID = $_POST['UserID'];
    $password = $_POST['password'];
    $password_re = $_POST['password_re'];

    // Kiểm tra mật khẩu nhập lại
    if ($password !== $password_re) {
        echo "Mật khẩu nhập lại không trùng khớp. Vui lòng thử lại.";
        exit();
    }

    // Mã hóa mật khẩu (sử dụng phương pháp mã hóa mạnh mẽ như password_hash)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Sử dụng prepared statement để tránh SQL injection
    $stmt_check = $conn->prepare("SELECT userID FROM user_hs WHERE userID = ?");
    $stmt_check->bind_param("s", $userID);

    // Thực hiện truy vấn
    $stmt_check->execute();

    // Kiểm tra xem userID đã tồn tại chưa
    $stmt_check->store_result();
    if ($stmt_check->num_rows > 0) {
        echo "Tài khoản đã tồn tại. Vui lòng chọn một tài khoản khác.";
        $stmt_check->close();
        exit();
    }
    
    $stmt_check->close();

    // Chuẩn bị truy vấn thêm mới
    $stmt = $conn->prepare("INSERT INTO user_hs (userID, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $userID, $password);

    // Thực hiện truy vấn thêm mới
    if ($stmt->execute()) {
        echo "Đăng ký thành công! <a href='dangnhap.php'>Đăng nhập ngay!</a>";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

?>


</body>
</html>