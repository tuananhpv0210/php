<?php 
include('header.php');
$errorMessages = [];
$requestData=$_POST;
if(isset($requestData['username'])){
	$username = $requestData['username'];
	$password = $requestData['password'];
	$password_confirm = $requestData['password_confirm'];
	$email = $requestData['email'];
	$name = $requestData['name'];
	$birthday = $requestData['birthday'];
	$address= $requestData['address']; 

	if(empty($username)){
		$errorMessages['username'] = 'hãy nhập tên';
	}
	if(empty($password)){
		$errorMessages['password'] = 'hãy nhập mật khẩu';
	}
	if(empty($password_confirm)){
		$errorMessages['password_confirm'] = 'hãy nhập mật khẩu';
	}
	if($password != $password_confirm){
		$errorMessages['password_confirm'] = 'mât khẩu nhập lại sai';
	}
	if(empty($email)){
		$errorMessages['email'] = 'hãy nhập email';
	}
	if(empty($name)){
		$errorMessages['name'] = 'hãy nhập tên tài khoản ';
	}
	if(empty($birthday)){
		$errorMessages['birthday'] = 'hãy nhập ngày sinh ';
	}
	if(empty($address)){
		$errorMessages['address'] = 'hãy nhập quê quán';
	}

	if(empty($errorMessages)){
		$password = password_hash($password, PASSWORD_DEFAULT);
			// var_dump($pass);
			// die();
		$sql = "INSERT INTO users(username,password,email,name,birthday,address) VALUES ('$username','$password','$email','$name','$birthday','$address')";
		$query = mysqli_query($conn,$sql);
		if($query){
			header('location: login.php');
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
					<span style="color: red"><?php echo (isset($errorMessages['username']))?$errorMessages['username']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" class="form-control" id="" placeholder="Input field" name="email">
					<span style="color: red"><?php echo (isset($errorMessages['email']))?$errorMessages['email']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">password</label>
					<input type="password" class="form-control" id="" placeholder="Input field" name="password">
					<span style="color: red"><?php echo (isset($errorMessages['password']))?$errorMessages['password']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">password_confirm</label>
					<input type="password" class="form-control" id="" placeholder="Input field" name="password_confirm">
					<span style="color: red"><?php echo (isset($errorMessages['password_confirm']))?$errorMessages['password_confirm']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">name acc</label>
					<input type="" class="form-control" id="" placeholder="Input field" name="name">
					<span style="color: red"><?php echo (isset($errorMessages['name']))?$errorMessages['name']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">birthday</label>
					<input type="date" class="form-control" id="" placeholder="Input field" name="birthday">
					<span style="color: red"><?php echo (isset($errorMessages['birthday']))?$errorMessages['birthday']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">address</label>
					<input type="" class="form-control" id="" placeholder="Input field" name="address">
					<span style="color: red"><?php echo (isset($errorMessages['address']))?$errorMessages['address']:'' ?></span>
				</div>



				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>



<?php include('footer.php') ?>


