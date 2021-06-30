<?php
	include_once "vendor/autoload.php";
	use App\Controllers\Student;//To use the Student class from Student.php inside Controllers
	$stu = new Student;
	if(isset($_GET['delete_id'])){
		$id=$_GET['delete_id'];
		$stu-> deleteStudent($id);
	}
  if(isset($_GET['restore_id'])){
		$id=$_GET['restore_id'];
		$stu-> restoreStudent($id);
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Data</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/css/all.css">
  <link rel="stylesheet" href="assets/css/style3.css">
</head>
<body>

	
	<div class="wrap-table w-100 p-3">

		<div class="card-shadow">	
			<div class="card-body input-group">
				<form class="input-group" action="" method="POST">
					<h2 class="me-3">All Data</h2>
					<input name="search" type="search" class="form-control" placeholder="Search">
					<button name="searchbtn" class="btn btn-outline-primary" type="submit">Search</button>
				</form>
				<h6><a style="text-decoration:none" class="badge rounded-pill bg-primary mt-2 text-light" href="index.php">Published <?php echo $stu -> dataCount(); ?></a></h6>
				<h6><a style="text-decoration:none" class="badge rounded-pill bg-danger mt-2 ms-2 text-light" href="trash.php">Trash <?php echo $stu -> dataCount('trash'); ?></a></h6>
			</div>
				<table class="table table-success table-striped text-success">
					<thead>
						<tr>
							<th class="col-sm-1"></th>
							<th class="col-sm-1">Name</th>
							<th class="col-sm-2">Photo</th>
							<th class="col-sm-3">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$data=$stu->allStudent(1);
						$i = 1;
						while($student=$data->fetch_object()):
					?>
						<tr>
							<td><?php echo $i; $i++; ?></td>
							<td><?php echo $student -> name; ?></td>
							<td><img style="width:100px;" src="photos/students/<?php echo $student -> photo;?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info text-light" href="?restore_id=<?php echo $student -> id; ?>">Restore Data</a>
								<a class="btn btn-sm btn-danger delete_btn" href="?delete_id=<?php echo $student -> id; ?>&photo=<?php  ?>">Delete Permanently</a>
							</td>
						</tr>
						<?php
							endwhile;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/script.js"></script>

</body>
</html>