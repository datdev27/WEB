<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css\update.css" rel="stylesheet">
    <link href="css\base.css" rel="stylesheet">
</head>
<body>
<h1>Nhập thông tin học sinh</h1>
    <form action="" method="get">
        ID học sinh: <br>
        <input type="text" name ="ID_HS"><br>
        Lớp: <br>
        <input type="text" name="Lop" id=""><br>
        Họ và Tên: <br>
        <input type="text" name="Ten_HS" id=""><br>
        <input type="submit" name="Update" id="">
    </form>
    <?php
    ?>
    <?php
if(isset($_GET['Update']))
{
    $ID_HS = $_GET["ID_HS"];
    $Lop = $_GET["Lop"];
    $Ten_HS = $_GET["Ten_HS"];
    
    require "ketnoi.php";

    // Sử dụng prepared statement để tránh SQL injection
    $sql = "UPDATE hocsinh SET ID_HS = ?, Lop = ?, Ten_HS = ? WHERE ID_HS = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issi", $ID_HS, $Lop, $Ten_HS, $ID_HS);
    
    if(mysqli_stmt_execute($stmt))
    {
        header("location: nhapbang_hs.php");
    }
    else
    {
        echo "Lỗi trong quá trình cập nhật: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
    <button onclick="goBack()">Quay lại</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>