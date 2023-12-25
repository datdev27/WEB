    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Danh sách học sinh</title>
        <link rel="stylesheet" href="css\show.css">
        <link href="css\base.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
    <a href='teacherhome.php'> Trang Chủ</a>
        <h1>Danh sách học sinh</h1>
        <table>
            <tr>
                <th>ID Học Sinh</th>
                <th>Lớp</th>
                <th>Tên học sinh</th>
                <th>Thao tác</th>
            </tr>

            <?php
            require "ketnoi.php";
            mysqli_set_charset($conn, 'UTF8');

            $sql = "SELECT * FROM hocsinh";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID_HS"] . "</td>"; 
                    echo "<td>" . $row["Lop"] . "</td>"; 
                    echo "<td>" . $row["Ten_HS"] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row['ID_HS'] . "'>Sửa</a>
                        <a onclick=\"return confirm('Bạn có muốn xóa không?');\" href='xoa.php?id=" . $row['ID_HS'] . "' class='btn btn-danger'>Xóa</a></td>"; // Sửa đoạn mã xóa và thêm kết thúc của thẻ <td>
                    echo "</tr>";
                }
            
            } else {
                echo "<tr><td colspan='4'>No in database</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
    </body>
    </html>
