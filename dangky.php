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

<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Registration</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username: </label><br>
                                <input type="text" name="username" id="username" class="form-control">
                               <span style="color: red"><?php echo (isset($err['username']))?$err['username']:'' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password: </label><br>
                                <input type="text" name="password" id="password" class="form-control">
                                <span style="color: red"><?php echo (isset($err['password']))?$err['password']:'' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password (Confirm): </label><br>
                                <input type="text" name="password_confirm" id="" class="form-control">
                                <span style="color: red"><?php echo (isset($err['password_confirm']))?$err['password_confirm']:'' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">email: </label><br>
                                <input type="text" name="email" id="password" class="form-control">
                                 <span style="color: red"><?php echo (isset($err['email']))?$err['email']:'' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Account name: </label><br>
                                <input type="text" name="name" id="" class="form-control">
								<span style="color: red"><?php echo (isset($err['name']))?$err['name']:'' ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">birthday: </label><br>
                                <input type="date" name="birthday" id="" class="form-control">
                                <span style="color: red"><?php echo (isset($err['birthday']))?$err['birthday']:'' ?></span>

                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">address:  </label><br>
                                <input type="text" name="address" id="" class="form-control">
                                <span style="color: red"><?php echo (isset($err['address']))?$err['address']:'' ?></span>

                            </div>
                           
                            <div id="register-link" class="text-right">
                               <button type="submit" class="btn btn-primary" name="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Panel title</h3>
		</div>
		<div class="panel-body">
			Panel content
		</div>
	</div>
</div>

<?php include('footer.php') ?>


