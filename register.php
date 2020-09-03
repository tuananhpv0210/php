<?php 
include('header.php');
$validateMessage = [];
$request = $_POST;

if($_SERVER['REQUEST_METHOD'] === 'POST') { // Nếu là post method thì mới thực hiện
	/*
	$username = $requestData['username'];
	$password = $requestData['password'];
	$password_confirm = $requestData['password_confirm'];
	$email = $requestData['email'];
	$name = $requestData['name'];
	$birthday = $requestData['birthday'];
	$address= $requestData['address']; 

	if(empty($username)) {
		$validateMessage['username'] = 'hãy nhập tên';
	}
	if(empty($password)) {
		$validateMessage['password'] = 'hãy nhập mật khẩu';
	}
	if(empty($password_confirm)) {
		$validateMessage['password_confirm'] = 'hãy nhập mật khẩu';
	}
	if($password != $password_confirm) {
		$validateMessage['password_confirm'] = 'mât khẩu nhập lại sai';
	}
	if(empty($email)) {
		$validateMessage['email'] = 'hãy nhập email';
	}
	if(empty($name)) {
		$validateMessage['name'] = 'hãy nhập tên tài khoản ';
	}
	if(empty($birthday)) {
		$validateMessage['birthday'] = 'hãy nhập ngày sinh ';
	}
	if(empty($address)) {
		$validateMessage['address'] = 'hãy nhập quê quán';
	}*/
	$rules = ['username', 'password', 'password_confirm', 'email', 'name', 'birthday', 'address'];
	$messages = [
		'username' => 'Tên không được để trống',
		'password' => 'Mật khẩu không được bỏ trống',
		'password_confirm' => 'Mật khẩu xác nhận không được bỏ trống',
		'same_password' => 'Xác nhận mật khẩu không khớp',
		'email' => 'Email không được bỏ trống',
		'name' => 'Tên không được bỏ trống',
		'birthday' => 'Ngày sinh nhật không được bỏ trống',
		'address' => 'Địa chỉ không được bỏ trống',
	];
	$validated = true;
	$user = [];
	foreach ($rules as $field) {
		if (!isset($request[$field]) or empty($request[$field])) {
			$validated = false;
			$validateMessage[$field] = $messages[$field];
			continue;
		}
		if ($field === 'password_confirm' && $request[$field] !== $request['password']) {
			$validateMessage[$field] = $messages['same_password'];
			continue;
		}

		if ($field !== 'password_confirm') {
			$user[$field] = $request[$field];
		}
	}
	if(!count($validateMessage)) {

		$username = $request['username'];
		$password= $request['password'];
		$email = $request['email'];
		$name = $request['name'];
		$birthday = $request['birthday'];
		$address = $request['address'];

		$password = password_hash($request['password'], PASSWORD_DEFAULT);

		$command = "INSERT INTO users (username, password, email,name, birthday,address) VALUES ('$username', '$password', '$email','$name' ,'$birthday','$address')";
		$query = mysqli_query($conn, $command);
		if($query) {
			header('location: login.php');
		}
	}
}
?>

<div class="container">
	<div class="row justify-content-center" id="register-form">
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Register</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form">
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="username">
							<span style="color: red"><?php echo (isset($validateMessage['username']))?$validateMessage['username']:'' ?></span>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" name="email" placeholder="Nhập email">
							<span style="color: red"><?php echo (isset($validateMessage['email']))?$validateMessage['email']:'' ?></span>
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" class="form-control"  name="password" placeholder="Nhập password">
							<span style="color: red"><?php echo (isset($validateMessage['password']))?$validateMessage['password']:'' ?></span>
						</div>
						<div class="form-group">
							<label for="">Password_confirm</label>
							<input type="password" class="form-control"  name="password_confirm" placeholder="Nhập lại password">
							<span style="color: red"><?php echo (isset($validateMessage['password_confirm']))?$validateMessage['password_confirm']:'' ?></span>
						</div>
						<div class="form-group">
							<label for="">Account name</label>
							<input type="" class="form-control"  name="name" placeholder="Nhập tên tài khoản">
							<span style="color: red"><?php echo (isset($validateMessage['name']))?$validateMessage['name']:'' ?></span>
						</div>
						<div class="form-group">
							<label for="">Birthday</label>
							<input type="date" class="form-control"  name="birthday" >
							<span style="color: red"><?php echo (isset($validateMessage['birthday']))?$validateMessage['birthday']:'' ?></span>
						</div>
						<div class="form-group">
							<label for="">Address</label>
							<input type="" class="form-control"  name="address" placeholder="Nhập quê quán">
							<span style="color: red"><?php echo (isset($validateMessage['address']))?$validateMessage['address']:'' ?></span>
						</div>



						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



<?php include('footer.php') ?>


