<?php 
include('./layouts/header.php');
$information =  mysqli_query($conn,"SELECT * from users");
session_start();
// if(!isset($_SESSION['user'])){
// 	header("location: login.php");
// }
?>
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">
					<i class="fa fa-home"></i>
					Home
					<span class="sr-only">(current)</span>
				</a>
			</li>
			
		</ul>
		<ul class="navbar-nav ">
			<?php if(isset($_SESSION['user'])){ ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?php echo $_SESSION['user']['username'] ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="logout.php">logout</a>
						<a class="dropdown-item" href="informationUser.php?id=<?php echo $_SESSION['user']['id']?>">information</a>
						<a class="dropdown-item" href="configPassword.php?id=<?php echo $_SESSION['user']['id']?>">Security</a>
					</div>
				</li>
			<?php }else{ ?>
				<li><a href="login.php">login</a></li>
			<?php } ?>
		</ul>

		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>
<div class="container pt-5">
	<div class="jumbotron">
		<div class="container">
			<?php if(isset($_SESSION['user'])){ ?>
				<h1>Hello <?php echo $_SESSION['user']['username'] ?></h1>
				<p>Contents ...</p>
				<p>
					<a href="logout.php " title="" class="btn btn-primary btn-lg">logout</a>
				</p>
			<?php }else{ ?>
				<h1>hellooo, pro</h1>
				

				<p>Contents ...</p>
				<p>
					<a href="dangnhap.php " title="" class="btn btn-primary btn-lg">login</a>
				</p>
			<?php } ?>
		</div>
	</div>
</div>

