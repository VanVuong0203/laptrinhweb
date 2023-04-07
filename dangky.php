<meta charset="utf8">
<html>
	<head><title>Đăng ký</title></head>
    <?php
	if(isset ($_POST['btSignup']))
	{
	//lấy dữ liệu từ form
	$tendn=$_POST['nameuser'];
	$matkhau=$_POST['password'];
	$rematkhau=$_POST['passagain'];
	$hoten=$_POST['namecustomer'];
	$ngaysinh=$_POST['dateborn'];
	$gioitinh=$_POST['sex'];
	$dcemail=$_POST['email'];
	$thunhap=$_POST['salary'];
	//1.kết nối dữ liệu
		$kn=mysqli_connect("localhost","root","","datatest2023") or die("không kết nối được");
	//2,3.
	mysqli_query($kn,"SET NAMES 'utf8'");
	//4.xây dựng câu lệnh truy vấn
	$sql="INSERT INTO tbthongtin (Username,Password,Hoten,Ngaysinh, Gtinh,Email,Thunhap) Value ('".$tendn."','".$matkhau."','".$hoten."','".$ngaysinh."','".$gioitinh."','".$dcemail."','".$thunhap."')";
	//5.kiểm tra xem username hoặc email đã tồn tại
    $kt= "select * from  tbthongtin where Username ='".$tendn."' or email='".$dcemail."'";
	if($matkhau==$rematkhau){
		$kqkt=mysqli_query($kn,$kt);
		if($dong=mysqli_fetch_array($kqkt))
		echo "<script>
					alert('Tài khoản này đã được đăng ký,vui lòng đăng ký với tài khoản khác');
					window.history.back();
			  </script>";
		else{
			if($kq=mysqli_query($kn,$sql)){
				echo "<script>
				alert('Đăng ký thành công');
				window.history.back();
					  </script>";
			}else
			echo "<script> alert('Khong dang ki duoc');
				window.history.back();
				</script>";
			}
		}else
		echo "<script>
		alert('nhập mật khẩu không khớp');
		window.history.back();
			  </script>";
	//6.lấy  kết nối trả về
	mysqli_close($kn);
	}
	?>
	<body>
	<table align="center" border="1">
			<h2 align="center" style="color: red">Đăng ký khách hàng</h2>
			<form action="<?php echo($_SERVER['PHP_SELF']);?>" method="POST">
				<table align="center" border="0" style="background-color: LightGray;">
					<tr>
						<td colspan="2" bgcolor="Gray"><b>Thông tin đăng nhập</b></td>
					</tr>
					<tr>
						<td>Tên đăng nhập</td>
						<td><input type="text" name= "nameuser"</td>
					</tr>
					<tr>
						<td>Mật khẩu</td>
						<td><input type="password" name= "password"</td>
					</tr>
					<tr>
						<td>Nhập lại mật khẩu</td>
						<td><input type="password" name= "passagain"</td>
					</tr>
				</table>
				</br>
				<table align="center" border="0" style="background-color: LightGray;">
					<tr>
						<td colspan="2"bgcolor="Gray"><b>Thông tin chi tiết cá nhân</b></td>
					</tr>
					<tr>
						<td>Họ tên khách hàng</td>
						<td><input type="text" name= "namecustomer"</td>
					</tr>
					<tr>
						<td>Ngày sinh</td>
						<td><input type="text" name= "dateborn"</td>
					</tr>
					<tr>
						<td>Giới tính</td>
						<td><input type="radio" name= "sex" value="nam"<?php if (isset($_POST['sex'])) {$sex="Nam";}?>>Nam
							<input type="radio" name= "sex" value="nu"<?php if (isset($_POST['sex'])) {$sex="Nữ";}?>>Nữ</td>
					</tr>
					<tr>
						<td>Địa chỉ email</td>
						<td><input type="text" name= "email"</td>
					</tr>
					<tr>
						<td>Thu nhập</td>
						<td><input type="text" name= "salary"</td>
					</tr>
				</table>
				</br>
				<center><input type="submit" name= "btSignup" value="Đăng ký"></center>
			</form>
		</table>
	</body>
</html>