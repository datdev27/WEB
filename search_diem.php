<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/searchdiem.css">
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
<a href='studenthome.php'> Trang Chủ</a>    
<h1>Tra Cứu Điểm</h1>
    <p>Học sinh nhập id và họ tên để tìm điểm</p>
    <form action="" method="get">
        ID học sinh: <br>
        <input type="text" name="ID_HS" id=""> <br>
        Họ và tên: <br>
        <input type="text" name="Ten_HS" id=""><br>
        <input type="submit" name="Search" id="" value = "Search">
    </form>
</div>
<div class ="container1" >
    <table>
        <tr>
            <th>ID Học Sinh</th>
            <th>Tên học sinh</th>
            <th>Lớp</th>
            <th>Điểm toán</th>
            <th>Điểm văn</th>
            <th>Điểm anh</th>
        </tr>

    <?php
   if(isset($_GET["Search"]))
   {
       $Ten_HS = $_GET["Ten_HS"];
       $ID_HS = $_GET["ID_HS"];
       require "ketnoi.php"; 
       mysqli_set_charset($conn, 'UTF8');
   
       $sql = "SELECT HocSinh.ID_HS, HocSinh.Ten_HS, HocSinh.Lop, Diem.diem_toan, Diem.diem_van, Diem.diem_anh
       FROM HocSinh
       JOIN Diem ON HocSinh.ID_HS = Diem.ID_HS WHERE HocSinh.ID_HS = '$ID_HS' AND HocSinh.Ten_HS = '$Ten_HS' ";

       $result = $conn->query($sql);

       if ($result->num_rows > 0) {
           while ($row = $result->fetch_assoc()) {
               echo "<tr>";
               echo "<td>" . $row["ID_HS"] . "</td>";
               echo "<td>" . $row["Ten_HS"] . "</td>";
               echo "<td>" . $row["Lop"] . "</td>";
               echo "<td>" . $row["diem_toan"] . "</td>";
               echo "<td>" . $row["diem_van"] . "</td>";
               echo "<td>" . $row["diem_anh"] . "</td>";
               echo "</tr>";
           }   
       } else {
           echo "<tr><td colspan='6'>Không có kết quả.</td></tr>";
       }

       $conn -> close();
   }
    ?>
    
    
</body>
</html>