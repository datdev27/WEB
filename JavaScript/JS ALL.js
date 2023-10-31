<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng ký </title>
</head>
<body>

  <h1>Đăng ký </h1>

  <div class="form-group">
    <label for="fullname">Họ tên</label>
    <input type="text" name="fullname" id="fullname" placeholder="Họ và tên" required>
  </div>

  <div class="form-group">
    <label for="username">Tên đăng nhập</label>
    <input type="text" name="username" id="username" placeholder="Tên đăng nhập" required>
  </div>

  <div class="form-group">
    <label for="password">Mật khẩu</label>
    <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
  </div>

  <div class="form-group">
    <label for="repassword">Nhập lại mật khẩu</label>
    <input type="password" name="repassword" id="repassword" placeholder="Nhập lại mật khẩu" required>
  </div>

  <div class="form-group">
    <label for="country">Quốc tịch</label>
    <select name="country" id="country">
      <option value="VN">Việt Nam</option>
      <option value="US">Hoa Kỳ</option>
      <option value="UK">Anh Quốc</option>
      <option value="JP">Nhật Bản</option>
      <option value="CN">Trung Quốc</option>
      <option value="GER">Đức</option> 
    </select>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Email" required>
  </div>

  <div class="form-group">
    <label for="phone">Số điện thoại</label>
    <input type="text" name="phone" id="phone" placeholder="Số điện thoại" required>
  </div>

  <div class="form-group">
    <label for="question">Câu hỏi bảo mật</label>
    <select name="question" id="question">
      <option value="1">Bạn đặt tên cho thú cưng của mình là gì ?</option>
      <option value="2">Mẹ bạn sinh ngày bao nhiêu ?</option>
      <option value="3">Bạn ghét gì nhất ?</option>
    </select>
  </div>

  <div class="form-group">
    <label for="answer">Trả lời</label>
    <input type="text" name="answer" id="answer" placeholder="Trả lời" required>
  </div>
  <button type="checkbox">kiểm tra</button>
  <button type="submit">Đăng ký</button>


</form>

</body>
</html>
<script>
    function checkForm() {
  // Kiểm tra xem tất cả các trường nhập liệu đều đã được điền đầy đủ
  var isValid = true;
  var inputs = document.querySelectorAll("input[required]");
  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].value === "") {
      isValid = false;
      break;
    }
  }

  // Nếu không hợp lệ, hiển thị thông báo cho người dùng
  if (!isValid) {
    alert("Bạn chưa nhập đầy đủ thông tin. Vui lòng kiểm tra lại!");
    return false;
  }

  // Nếu hợp lệ, trả về true để tiếp tục xử lý form
  return true;
}
</script>
<script>
   document.addEventListener('DOMcontentLoaded',function(){
    document.querySelector('.checkForm').onclick=const;
   });
</script>