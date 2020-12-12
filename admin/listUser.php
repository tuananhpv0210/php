<?php 
include("index.php");
if(!isset($_SESSION['user'])){
	header("location: loginUser.php");
} 
$id = $_SESSION['user']['id'];
if (isset($_GET["search"]) && !empty($_GET["search"])) {
	$search = $_GET["search"];
	$query = "SELECT * FROM users Where id != $id AND (name like '%$search%') OR (email like '%$search%')";
} else{
	$query = "SELECT * FROM users Where id != $id";
}
$limit = 2;
$result = mysqli_query($conn,$query);
$row = mysqli_num_rows($result);
$total_page = ceil($row/$limit);

$current_page = isset($_GET["page"]) ? $_GET["page"] : 1;
$offset = ($current_page -1) * $limit;
$query .= " LIMIT " . $limit . " OFFSET " . $offset;

$users = mysqli_query($conn,$query);
?>

<style type="text/css">
	.pagination>li>a { border-radius: 50% !important;margin: 0 5px;}
</style>

<div class="container mt-5">
	<h2>List Users</h2>
	<hr>
	<div class="search">
		<form action="" method="get">
			<div class="form-group">
				<input type="" name="search" placeholder="Enter account or email" value="<?php if(isset($_GET["search"])) echo $_GET["search"]?>" class="form-control">	
			</div>
			<div>
				<button type="submit" class="btn btn-success">Search</button>
				<?php if(isset($_GET["search"]) && !empty($_GET["search"])) {?> 
					<button type="" class="btn "><a href="listUser.php">Quay Lại</a></button>
				<?php } ?>
			</div>
			
		</form>
	</div>  
	<div class="table_list pt-3" >        
		<table class="table">
			<thead>
				<tr>
					<th>STT</th>
					<th>Accout Name</th>
					<th>Email</th>
					<th>FullName</th>
					<th>Brithday</th>
					<th>Address</th>
					<th>Function</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $key => $user): ?>
					<tr>
						<td><?php echo $user["id"] ?> </td>
						<td><?php echo $user["name"]?></td>
						<td><?php echo $user["email"]?></td>
						<td><?php echo $user["username"]?></td>
						<td><?php echo $user["address"]?></td>
						<td><?php echo $user["birthday"]?></td>
						<td>
							<a href="deleteUser.php?id=<?php echo $user['id']?>">
								<button type="button" class="btn btn-danger">xóa</button>
							</a>
						</td>

					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div> 
	<div class="pagination pt-2">
		<?php 
			if (!isset($_GET["search"]) && $total_page != 1) {
					for($i = 1; $i <= $total_page; $i++) {
						echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>"; 
					} 
			} else if ($total_page != 1) {
					for($i = 1; $i <= $total_page; $i++) {
						echo "<li class='page-item'><a class='page-link' href='?search=$search&page=$i'>$i</a></li>"; 
					} 
			}
			
		?>

	</div>
	
</div>


<?php include("../footer.php") ?>