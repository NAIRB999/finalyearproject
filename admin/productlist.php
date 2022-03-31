<?php  
include 'link.php';
include 'conn.php';
include 'admin_auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>King</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
	href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
	rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<?php
	include 'sidebar.php';
	?>
	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="">

			<!-- Topbar -->
			<?php 
				include 'nav.php';
			?>
<!-- End of Topbar -->

<!-- Begin Page Content -->

<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Welcome <?= $_SESSION['staff_auth']['staff_name'] ?> </h1>
</div>

<div class="card card-login mx-auto mt-6">
	<div class="card-header"><h4>Product List</h4></div>
	<div class="card-body">
		<div class="col-md-12">
            <table class="table table-hover" style="color:#000">
            <tr style="font-size:17px">
            <th>Product Image</th>
            <th>ID</th>	
            <th>Product Name</th>
            <th>Size</th>
            <th>Price</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Action</th>
            </tr>
            <?php
            $query="select p.*, c.category_id, c.category_name, b.brand_id, b.brand_name
            from product p, category c, brand b 
            where p.category_id=c.category_id 
            and p.brand_id= b.brand_id";
            
            $go_query=mysqli_query($connection,$query);

            while ($row=mysqli_fetch_array($go_query)) {
            	
            	$proid=$row['product_id'];
				$proname=$row['product_name'];
				$size=$row['size'];
				$price=$row['price'];
				$desc=$row['description'];
				$qty=$row['quantity'];
				$cat=$row['category_name'];
				$brand=$row['brand_name'];
				$image=$row['image'];
				echo "<tr>";
				echo "<td><img src='Images/{$image}' width='100' height='100'></td>";
				echo "<td>{$proid}</td>";
				echo "<td>{$proname}</td>";
				echo "<td>{$size}</td>";
				echo "<td>{$price}</td>";
				echo "<td>{$desc}</td>";
				echo "<td>{$qty}</td>";
				echo "<td>{$cat}</td>";
				echo "<td>{$brand}</td>";
				echo "<td><a href='productdelete.php?p_id=$proid' style='color:red' onclick=\"return confirm('Are you sure?')\">
				X </a> || 
				<a href='productupdate.php?p_id=$proid'>Edit</a>
				</td>";
				
				
				echo "</tr>";
            }
            ?>
            </table>
            </div>

		</div>
	</div>


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
		<div class="modal-footer">
			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			<a class="btn btn-primary" href="login.html">Logout</a>
		</div>
	</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>