<?php include('heder.php') ?>

<div class="container pt-5">
			<div class="jumbotron">
				<div class="container">
					<?php if(isset($username['username'])){ ?>
						<h1>Hello <?php echo $username['username'] ?></h1>
					<?php }else{ ?>
						<h1>hellooo, pro</h1>
					<?php } ?>
					
					<p>Contents ...</p>
					<p>
						<a href="dangnhap.php" title="" class="btn btn-primary btn-lg">login</a>
					</p>
				</div>
			</div>
		</div>
<?php include('footer.php') ?>