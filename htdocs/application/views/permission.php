<?php
if (isset($_SESSION['admin']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	redirect('/loginAdm','refresh');
}
//else {
//	if (isset($_SESSION['permission']) == true) {
//		// Ngược lại nếu đã đăng nhập
//		$permission = $_SESSION['permission'];
//		// Kiểm tra quyền của người đó có phải là admin hay không
//		if ($permission != '1') {
//			// Nếu không phải admin thì xuất thông báo
//			echo "Bạn không đủ quyền truy cập vào trang này<br>";
//			echo "<a href='http://localhost/admin/index.php/login'> Click để về lại trang đăng nhập</a>";
//			exit();
//		}
//	}
//}
?>