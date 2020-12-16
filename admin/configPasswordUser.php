<?php
include('../layouts/header.php');
session_start();
if(!isset($_SESSION['user'])){
	header("location: loginUser.php");
}
$request = $_POST;
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
	$InformationUser = mysqli_fetch_assoc($sql);

	if(isset($request['update'])){
		$name = $request['name'];
		$password = $request['password'];
		$newPassword = $request['newPassword'];
		$newPasswordConfirm = $request['newPasswordConfirm'];
		$checkpass = password_verify($password, $InformationUser['password']);
		if($checkpass){
			if ($newPassword == $newPasswordConfirm) {
					# code...
				$newPassword = password_hash($request['newPassword'], PASSWORD_DEFAULT);
				$query = "UPDATE users SET password = '$newPassword' WHERE id = '$id'";
				$sql = mysqli_query($conn, $query);
				if ( $sql ) {
					header('location: logoutUser.php');
				} else {
					echo "Đổi mật khẩu thất bại";
				}

			} else {
				echo "Vui lòng nhập lại mật khẩu mới";
			}	
		}
		
	}
}

?>
<style type="text/css">
	.pass{

		padding-top: 30px;
		padding-bottom: 30px;
		margin-top: 80px;
	}
</style>
<div class="col-md-5 container pass" >
	<div class="panel panel-info" >
		<div  style="border-bottom: #000 solid 2px; text-align: center;">
			<h2>Config Password - <span><?php echo $InformationUser['username'] ?></span></h2>
		</div>
		<div class="panel-body"  style="padding-top: 15px;">
			<form action="" method="POST" role="form">
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" class="form-control" placeholder="Nhập Lại mật khẩu cũ" name="password"  value="">

				</div>
				<div class="form-group">
					<label for="">New Password</label>
					<input type="password" class="form-control" placeholder="Nhập mật khẩu mới" name="newPassword"  value="">

				</div>
				<div class="form-group">
					<label for="">New Password Confirm</label>
					<input type="password" class="form-control" placeholder="Nhập Lại mật khẩu mới" name="newPasswordConfirm"  value="">

				</div>


				<button type="update" class="btn btn-success" name="update">Update</button>
				<button type="" class="btn btn-primary"><a href="index.php" style="color: #fff">Exit</a></button>

			</form>
		</div>
	</div> 
</div>


<?php include('../layouts/footer.php') ?>