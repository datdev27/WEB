<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin học sinh</title>
    <link href="css\edit.css" rel="stylesheet">
    <link href="css\base.css" rel="stylesheet">
</head>
<body>
    <?php
    // Kết nối vào cơ sở dữ liệu
    require "ketnoi.php";

    // Kiểm tra xem ID học sinh đã được truyền vào từ URL hay chưa
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Truy vấn cơ sở dữ liệu để lấy thông tin của học sinh
        $sql = "SELECT * FROM hocsinh WHERE ID_HS = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        
        // Đảm bảo rằng có ít nhất một hàng dữ liệu được trả về
        if ($row) {
            $ID_HS = $row['ID_HS'];
            $Lop = $row['Lop'];
            $Ten_HS = $row['Ten_HS'];
            ?>
            
            <h1>Sửa thông tin học sinh</h1>
            <form action="" method="post">
                ID học sinh: <br>
                <input type="text" name="ID_HS" value="<?php echo $ID_HS; ?>"><br>
                Lớp: <br>
                <input type="text" name="Lop" value="<?php echo $Lop; ?>"><br>
                Họ và Tên: <br>
                <input type="text" name="Ten_HS" value="<?php echo $Ten_HS; ?>"><br>
                <input type="submit" name="Update" value="Cập nhật">
            </form>
    
            <?php
            // Xử lý khi form được submit
            if(isset($_POST['Update'])) {
                $Lop = $_POST["Lop"];
                $Ten_HS = $_POST["Ten_HS"];
    
                // Cập nhật thông tin học sinh vào cơ sở dữ liệu
                $update_sql = "UPDATE hocsinh SET Lop = ?, Ten_HS = ? WHERE ID_HS = ?";
                $update_stmt = mysqli_prepare($conn, $update_sql);
                mysqli_stmt_bind_param($update_stmt, "ssi", $Lop, $Ten_HS, $ID_HS);
    
                if(mysqli_stmt_execute($update_stmt)) {
                    echo "Cập nhật thành công!";
                    echo "<a href='nhapbang_hs.php'>    Quay về!</a>";
                } else {
                    echo "Lỗi trong quá trình cập nhật: " . mysqli_error($conn);
                }
    
                mysqli_stmt_close($update_stmt);
            }
        } else {
            echo "Không tìm thấy thông tin học sinh.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Thiếu ID học sinh.";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
