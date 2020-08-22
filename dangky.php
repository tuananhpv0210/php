<?php 
include('heder.php');
$err = [];
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$birthday = $_POST['birthday'];
	$address= $_POST['address']; 

	if(empty($username)){
		$err['username'] = 'hãy nhập tên';
	}
	if(empty($password)){
		$err['password'] = 'hãy nhập mật khẩu';
	}
	if(empty($password_confirm)){
		$err['password_confirm'] = 'hãy nhập mật khẩu';
	}
	if($password != $password_confirm){
		$err['password_confirm'] = 'mât khẩu nhập lại sai';
	}
	if(empty($email)){
		$err['email'] = 'hãy nhập email';
	}
	if(empty($name)){
		$err['name'] = 'hãy nhập tên tài khoản ';
	}
	if(empty($birthday)){
		$err['birthday'] = 'hãy nhập ngày sinh ';
	}
	if(empty($address)){
		$err['address'] = 'hãy nhập quê quán';
	}

	if(empty($err)){
		$password = password_hash($password, PASSWORD_DEFAULT);
			// var_dump($pass);
			// die();
		$sql = "INSERT INTO tbl_user(username,password,email,name,birthday,address) VALUES ('$username','$password','$email','$name','$birthday','$address')";
		$query = mysqli_query($conn,$sql);
		if($query){
			header('location: dangnhap.php');
		}
	}
}

?>
<div class="col-md-5">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Panel title</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" role="form">

				<div class="form-group">
					<label for="">Username</label>
					<input type="text" class="form-control" id="" placeholder="Input field" name="username">
					<span style="color: red"><?php echo (isset($err['username']))?$err['username']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" class="form-control" id="" placeholder="Input field" name="email">
					<span style="color: red"><?php echo (isset($err['email']))?$err['email']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">password</label>
					<input type="password" class="form-control" id="" placeholder="Input field" name="password">
					<span style="color: red"><?php echo (isset($err['password']))?$err['password']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">password_confirm</label>
					<input type="password" class="form-control" id="" placeholder="Input field" name="password_confirm">
					<span style="color: red"><?php echo (isset($err['password_confirm']))?$err['password_confirm']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">name acc</label>
					<input type="" class="form-control" id="" placeholder="Input field" name="name">
					<span style="color: red"><?php echo (isset($err['name']))?$err['name']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">birthday</label>
					<input type="date" class="form-control" id="" placeholder="Input field" name="birthday">
					<span style="color: red"><?php echo (isset($err['birthday']))?$err['birthday']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">address</label>
					<input type="" class="form-control" id="" placeholder="Input field" name="address">
					<span style="color: red"><?php echo (isset($err['address']))?$err['address']:'' ?></span>
				</div>



				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>



<?php include('footer.php') ?>


