<?php
require "ketnoi.php";

if(isset($_GET["id"]))
{
   $ID_HS = $_GET["id"];
   
   // Xóa thông tin học sinh
   $deleteHocSinhSql = "DELETE FROM hocsinh WHERE ID_HS = $ID_HS";
   $resultHocSinh = mysqli_query($conn, $deleteHocSinhSql);
   
   // Xóa điểm của học sinh
   $deleteDiemSql = "DELETE FROM diem WHERE ID_HS = $ID_HS";
   $resultDiem = mysqli_query($conn, $deleteDiemSql);
   
   // Kiểm tra và điều hướng trang
   if ($resultHocSinh && $resultDiem) {
       echo "Xóa thành công!";
   } else {
       echo "Lỗi xóa thông tin học sinh: " . mysqli_error($conn);
   }
   
   header("location: nhapbang_hs.php");
}
?>
