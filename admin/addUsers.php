<?php 
include('../layouts/header.php');
session_start();
if(!isset($_SESSION['user'])){
	header("location: loginUser.php");
}
$validateMessage = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') { 

	$request = $_POST;

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
	//âfaga
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
			header('location: listUser.php');
		}
	}
}
?>

<div class="col-md-5 container register" style="padding-bottom: 20px; padding-top: 20px">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title" style="text-align: center">Add New User</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" role="form" class="needs-validation" novalidate>
				<div class="form-group">
					<label for="validationCustom03">Username</label>
					<?php if (isset($validateMessage['username'])) { ?>
						<input type="text" class="form-control is-invalid" id="validationCustom03" placeholder="enter username" name="username">
					<div class="invalid-feedback">
						<?php echo  $validateMessage['username'] ?>
					</div>
					<?php } else {?>
						<input type="text" class="form-control " id="validationCustom03" placeholder="enter username" name="username">
					<?php } ?>

				</div>
				<div class="form-group">
					<label for="validationCustom03">Password</label>
					<?php if (isset($validateMessage['password'])) { ?>
						<input type="text" class="form-control is-invalid" id="validationCustom03" placeholder="enter password" name="password">
					<div class="invalid-feedback">
						<?php echo  $validateMessage['password'] ?>
					</div>
					<?php } else {?>
						<input type="text" class="form-control " id="validationCustom03" placeholder="enter password" name="password">
					<?php } ?>

				</div>
				<div class="form-group">
					<label for="validationCustom03">password_confirm</label>
					<?php if (isset($validateMessage['password_confirm'])) { ?>
						<input type="text" class="form-control is-invalid" id="validationCustom03" placeholder="enter password_confirm" name="password_confirm">
					<div class="invalid-feedback">
						<?php echo  $validateMessage['password_confirm'] ?>
					</div>
					<?php } else {?>
						<input type="text" class="form-control " id="validationCustom03" placeholder="enter password_confirm" name="password_confirm">
					<?php } ?>

				</div>
				<div class="form-group">
					<label for="validationCustom03">email</label>
					<?php if (isset($validateMessage['email'])) { ?>
						<input type="text" class="form-control is-invalid" id="validationCustom03" placeholder="enter email" name="email">
					<div class="invalid-feedback">
						<?php echo  $validateMessage['email'] ?>
					</div>
					<?php } else {?>
						<input type="text" class="form-control " id="validationCustom03" placeholder="enter email" name="email">
					<?php } ?>

				</div>
				<div class="form-group">
					<label for="validationCustom03">Accout name</label>
					<?php if (isset($validateMessage['name'])) { ?>
						<input type="text" class="form-control is-invalid" id="validationCustom03" placeholder="enter name" name="name">
					<div class="invalid-feedback">
						<?php echo  $validateMessage['name'] ?>
					</div>
					<?php } else {?>
						<input type="text" class="form-control " id="validationCustom03" placeholder="enter name" name="name">
					<?php } ?>

				</div>
				<div class="form-group">
					<label for="validationCustom03">birthday</label>
					<?php if (isset($validateMessage['birthday'])) { ?>
						<input type="text" class="form-control is-invalid" id="validationCustom03" placeholder="enter birthday" name="birthday">
					<div class="invalid-feedback">
						<?php echo  $validateMessage['birthday'] ?>
					</div>
					<?php } else {?>
						<input type="text" class="form-control " id="validationCustom03" placeholder="enter birthday" name="birthday">
					<?php } ?>

				</div>
				<div class="form-group">
					<label for="validationCustom03">address</label>
					<?php if (isset($validateMessage['address'])) { ?>
						<input type="text" class="form-control is-invalid" id="validationCustom03" placeholder="enter address" name="address">
					<div class="invalid-feedback">
						<?php echo  $validateMessage['address'] ?>
					</div>
					<?php } else {?>
						<input type="text" class="form-control " id="validationCustom03" placeholder="enter address" name="address">
					<?php } ?>

				</div>
				<button type="submit" class="btn btn-success" >Submit</button>
				<button type="" class="btn btn-primary"><a href="index.php" style="color: #fff;">Quay Lại</a></button>
			</form>
		</div>
	</div>
</div>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
	'use strict';
	window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    	form.addEventListener('submit', function(event) {
    		if (form.checkValidity() === false) {
    			event.preventDefault();
    			event.stopPropagation();
    		}
    		form.classList.add('was-validated');
    	}, false);
    });
}, false);
})();
</script>
<?php include('../layouts/footer.php') ?>


