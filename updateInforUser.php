<?php 
include('header.php');
$errorMessages = [];
$requestData=$_POST;
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = mysqli_query($conn,"SELECT * FROM users WHERE id = $id");
	$users = mysqli_fetch_assoc($sql);
	if(isset($requestData['username'])){
		$username = $requestData['username'];
		$email = $requestData['email'];
		$name = $requestData['name'];
		$birthday = $requestData['birthday'];
		$address = $requestData['address']; 

		if(empty($username)){
			$errorMessages['username'] = 'hãy nhập tên';
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

		$sql = "UPDATE users SET username = '$username', email ='$email',  name ='$name', birthday ='$birthday', address ='$address' WHERE id ='$id'";
		$query = mysqli_query($conn,$sql);
		if($query){
			header('location: informationUser.php');
		}
	}
}


?>
<div class="col-md-5">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Update Information User</h3>
		</div>
		<div class="panel-body">
			<form action="" method="POST" role="form">

				<div class="form-group">
					<label for="">Username</label>
					<input type="text" class="form-control" id="" placeholder="Input field" name="username"  value="<?php echo $users['username'] ?>">
					<span style="color: red"><?php echo (isset($errorMessages['username']))?$errorMessages['username']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" class="form-control" id="" placeholder="Input field" name="email" value="<?php echo $users['email'] ?>">
					<span style="color: red"><?php echo (isset($errorMessages['email']))?$errorMessages['email']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">name acc</label>
					<input type="database/" class="form-control" id="" placeholder="Input field" name="name" value="<?php echo $users['name'] ?>">
					<span style="color: red"><?php echo (isset($errorMessages['name']))?$errorMessages['name']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">birthday</label>
					<input type="date" class="form-control" id="" placeholder="Input field" name="birthday" value="<?php echo $users['birthday'] ?>">
					<span style="color: red"><?php echo (isset($errorMessages['birthday']))?$errorMessages['birthday']:'' ?></span>
				</div>
				<div class="form-group">
					<label for="">address</label>
					<input type="" class="form-control" id="" placeholder="Input field" name="address" value="<?php echo $users['address'] ?>">
					<span style="color: red"><?php echo (isset($errorMessages['address']))?$errorMessages['address']:'' ?></span>
				</div>



				<button type="submit" class="btn btn-primary" name="update">Update</button>
			</form>
		</div>
	</div>
</div>



<?php include('footer.php') ?>

