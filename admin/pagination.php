<?php 

if (isset($_GET["search"]) && !empty($_GET["search"])) {
	 $query = "SELECT * from users WHERE (name like '%$search%') OR (email like '%$search%')";
} else {
	$query = "SELECT * from users";
}
$result = mysqli_query($conn,$query);
$row = mysqli_num_rows($result);
$total_page = ceil($row/$limit);

for($i = 1; $i <= $total_page; $i++) {
	echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>"; 
} 
?>
