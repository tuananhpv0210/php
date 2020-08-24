<?php
include('header.php');
session_start();
if(!isset($_SESSION['user'])){
	header("location: login.php");
}
?>
<div class="container">
	<?php if(isset($_SESSION['user'])){ ?>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Panel title</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Name acc</th>
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
			<button type="button" class="btn btn-default"><a href="index.php">chỉnh sửa</a></button>
		</div>
	</div>
<?php } ?>
</div>

<?php include('footer.php') ?>