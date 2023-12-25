<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css\nhapbanghs.css">
    <link href="css\base.css" rel="stylesheet">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
</head>
<body>
<div class="container">
<a href='teacherhome.php'> Trang Chủ</a>
    <h1>Nhập thông tin học sinh</h1>
    <form action="nhapbang_hs.php" method="post">
        ID học sinh: <br>
        <input type="text" name ="ID_HS"><br>
        Lớp: <br>
        <input type="text" name="Lop" id=""><br>
        Họ và Tên: <br>
        <input type="text" name="Ten_HS" id=""><br>
        <input type="submit" name="Search" id="">
    </form>
</div>
    <?php
    if(isset($_POST['Search']))
    {
        $ID_HS = $_POST["ID_HS"];
        $Lop = $_POST["Lop"];
        $Ten_HS = $_POST["Ten_HS"];
        require "ketnoi.php";
        $sql = "INSERT INTO hocsinh(ID_HS, Lop, Ten_HS) VALUES ('$ID_HS', '$Lop', '$Ten_HS')";
        if ($conn -> query($sql) === TRUE)
        {
            echo "Đã nhập thành công! <a href='teacherhome.php'> Quay lại</a>";
        }else
        {
            echo "Nhập thất bại";
        }
        $conn -> close();
    }
    ?>
    <div class ="container" >
    <h1>Danh sách học sinh</h1>
    <br>
    
        <table class="table table-striped">
        <thead>
        <tr>
            <th>ID học sinh</th>
            <th>Lớp</th>
            <th>Họ và tên</th>
            <th>Thao tác</th>
        </tr>
        </thead>   
        <tbody>
        <?php
            require "ketnoi.php";
            $sql = "SELECT * FROM hocsinh ";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                <td><?php echo $row['ID_HS'];?></td>
                <td><?php echo $row['Lop'];?></td>
                <td><?php echo $row['Ten_HS'];?></td>
                <td><a href="edit.php?id=<?php echo $row['ID_HS'];?>" class="btn btn-primary">Sửa</a> 
                <a onclick ="return confirm('Bạn có muốn xóa không?');" href="xoa.php?id=<?php echo $row['ID_HS'];?>" class="btn btn-danger">Xóa</a>
                </td>
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