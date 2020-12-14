<?php 
session_start();
include('./layouts/header.php');
$request = $_POST;
if(isset($request['submit'])){
	$name = $request['name'];
	$password = $request['password'];
	$sql = "SELECT * FROM users WHERE name = '$name'";
	$query = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($query);
	$checkname = mysqli_num_rows($query);
		// var_dump($checkname);
	if($checkname == 1){
		$checkpass = password_verify($password, $data['password']);
		if($checkpass){
			$_SESSION['user']= $data;
			header('location: index.php');
		}
		else{
			echo 'đăng nhập thất bại';
		}
	}
	else{
		echo 'Vui lòng nhập đầy đủ thông tin';
	}

}


?>
<style type="text/css">
	.login{
		background: #B0C4DE ;
		margin-top: 100px; 
	}
</style>
<div class="col-md-5 container login" style="padding-top: 50px; padding-bottom: 30px;">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title" style="text-align: center; color: #fff;">LOGIN</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" role="form">

				<div class="form-group">
					<label for="">Account name</label>
					<input type="text" class="form-control" id="" placeholder="Enter account name" name="name">
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" class="form-control" id="" placeholder="Enter password" name="password">

				</div>
				<div class="form-group">
					<a href="register.php">Register</a>
					<a href="gmail.php">Forgot password</a>

				</div>

				
				<button type="submit" class="btn btn-primary" name="submit">Login</button>
			</form>
		</div>
	</div>
</div>

<?php include('./layouts/footer.php') ?>


