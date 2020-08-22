<?php 
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
			$checkpass = password_verify($password, $data['password']);
			if($checkpass){
				$_SESSION['user']= $data;
				
				header('location: index.php');
			}
			else{
				echo 'thất bại';
			}
		}
		else{
			echo 'tài khoản của bạn không tồn tại';
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
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">name:</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                               <a href="dangky.php" title="">đăng ký</a>
                            </div>
                            
                            <div id="register-link" class="text-right">
                               <button type="submit" class="btn btn-primary" name="submit">login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include('footer.php') ?>


