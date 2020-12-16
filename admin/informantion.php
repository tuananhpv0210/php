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
		if(!empty($request['username'])){
			$username = $request['username'];
			$email = $request['email'];
			$name = $request['name'];
			$birthday = $request['birthday'];
			$address = $request['address'];

			$query = "UPDATE users SET username = '$username', email ='$email', name ='$name', birthday ='$birthday', address ='$address'  WHERE id = $id";
			mysqli_query($conn, $query);

			header('location: listUser.php');
		}
	}
}

?>
<style type="text/css">
	.pass{
		background: #B0C4DE;
		padding-top: 30px;
		padding-bottom: 30px;
		margin-top: 80px;
	}
</style>	

<div class="col-md-6 container pass">
	<div class="panel panel-info" >
		<div  style="border-bottom: #000 solid 2px; text-align: center;">
			<h2>User Information</h2>
		</div>
		<div class="panel-body"  style="padding-top: 15px;">
			<form action="" method="POST" role="form">
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="username"  value="<?php echo $InformationUser['username'] ?>">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" class="form-control" name="email" placeholder="Nhập email"  value="<?php echo $InformationUser['email'] ?>">
				</div>
				<div class="form-group">
					<label for="">Account name</label>
					<input type="" class="form-control"  name="name" placeholder="Nhập tên tài khoản"  value="<?php echo $InformationUser['name'] ?>">
				</div>
				<div class="form-group">
					<label for="">Birthday</label>
					<input type="date" class="form-control"  name="birthday"  value="<?php echo $InformationUser['birthday'] ?>">
				</div>
				<div class="form-group">
					<label for="">Address</label>
					<input type="" class="form-control"  name="address" placeholder="Nhập quê quán"  value="<?php echo $InformationUser['address'] ?>">

				</div>
				<button type="update" class="btn btn-success" name="update">Update</button>
				<button type="" class="btn btn-primary "><a href="index.php" style="color: #fff">Exit</a></button>

			</form>
		</div>
	</div>
</div>



<?php include('../layouts/footer.php') ?>