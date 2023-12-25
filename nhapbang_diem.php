<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nhapbangdiem.css">
    <link href="css\base.css" rel="stylesheet">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    
</head>
<body>
<div class ="container" >
<a href='teacherhome.php'> Trang Chủ</a>
    <h1>Nhập điểm học sinh</h1>
    <form action="" method="post">
        ID học sinh: <br>
        <input type="text" name="ID_HS" id="" required><br>
        Tên học sinh: <br>
        <input type="text" name="Ten_HS" id="" required><br>
        Điểm toán: <br>
        <input type="text" name="diem_toan" id="" required><br>
        Điểm văn: <br>
        <input type="text" name="diem_van" id="" required><br>
        Điểm anh: <br>
        <input type="text" name="diem_anh" id="" required> <br>
        <input type="submit" name="Search" id="">   
    </form>
</div>
<?php
if(isset($_POST["Search"])) {
    $ID_HS = $_POST['ID_HS'];
    $Ten_HS= $_POST['Ten_HS'];
    $diem_toan = $_POST['diem_toan'];
    $diem_van = $_POST['diem_van'];
    $diem_anh = $_POST['diem_anh'];
    
    // Kiểm tra xem các trường dữ liệu có giá trị hay không
    if (!empty($ID_HS) && !empty($Ten_HS) && !empty($diem_toan) && !empty($diem_van) && !empty($diem_anh)) {
        require "ketnoi.php";
        
        $sql = "INSERT INTO diem (ID_HS, Ten_HS, diem_toan, diem_van, diem_anh) 
                VALUES ('$ID_HS', '$Ten_HS', '$diem_toan', '$diem_van', '$diem_anh')";
        
        if($conn->query($sql)) {
            echo "Bạn đã nhập thành công <a href='teacherhome.php'>Quay lại</a>";
        } else {
            echo "[error:]" . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    } else {
        echo "Vui lòng nhập đầy đủ thông tin.";
    }
}
?>

<div class ="container" >
    <h1 style="text-align: center;">Danh sách điểm lớp 10A7</h1>
    <br>
    
        <table class="table table-striped">
        <thead>
        <tr>
            <th>ID Học Sinh</th>
            <th>Tên Học sinh</th>
            <th>Điểm toán</th>
            <th>Điểm văn</th>
            <th>Điểm anh</th>
        </tr>
        </thead>   
        <tbody>
        <?php
            require "ketnoi.php";
            $sql = "SELECT * FROM diem";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                <td><?php echo $row['ID_HS'];?></td>
                <td><?php echo $row['Ten_HS'];?></td>
                <td><?php echo $row['diem_toan'];?></td>
                <td><?php echo $row['diem_van'];?></td>
                <td><?php echo $row['diem_anh'];?></td>
                </tr>
            <?php
            }

            $conn->close();
        ?>
        </tbody>
        </table>
    </div>
  
</body>
</html>