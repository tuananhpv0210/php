<?php
include('header.php');
session_start();
if(!isset($_SESSION['user'])){
	header("location: login.php");
}

$users = mysqli_query($conn,"SELECT * FROM users ");

?>
<div class="container">
	<?php if(isset($_SESSION['user'])){ ?>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Information User</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Accout Name</th>
						<th>Email</th>
						<th>Birthday</th>
						<th>Address</th>
					</tr>
				</thead>		
				<tbody>
					<tr>
						<td><?php echo $_SESSION['user']['name'] ?></td>
						<td><?php echo $_SESSION['user']['email'] ?></td>
						<td><?php echo $_SESSION['user']['birthday'] ?></td>
						<td><?php echo $_SESSION['user']['address'] ?></td>
					</tr>
				</tbody>
			</table>
			<button type="button" class="btn btn-default"><a href="index.php">Quay lại</a></button>
			
			
		</div>
	</div>
<?php } ?>
</div>

<?php include('footer.php') ?>