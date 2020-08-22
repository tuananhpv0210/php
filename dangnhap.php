<?php 
session_start();
include('heder.php');
if(isset($_POST['name'])){
		$name = $_POST['name'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM tbl_user WHERE name = '$name'";
		$query = mysqli_query($conn,$sql);
		$data = mysqli_fetch_assoc($query);
		$checkname = mysqli_num_rows($query);
		// var_dump($checkname);
		if($checkname == 1){
			$_SESSION['user'] = $name;
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
			echo 'tài khoản của bạn không tồn tại';
		}

	}


?>

<div class="col-md-5" style="padding-top: 50px;">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Panel title</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" role="form">

				<div class="form-group">
					<label for="">name acc</label>
					<input type="text" class="form-control" id="" placeholder="Input field" name="name">
				</div>
				<div class="form-group">
					<label for="">password</label>
					<input type="password" class="form-control" id="" placeholder="Input field" name="password">

				</div>
				<div class="form-group">
					<a href="dangky.php">đăng ký</a>

				</div>

				
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>

<?php include('footer.php') ?>


