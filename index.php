<?php
	include_once "vendor/autoload.php";
	use App\Controllers\Student;//To use the Student class from Student.php inside Controllers
	$stu = new Student;

	if(isset($_POST['add'])){
		//Get values
		$name=$_POST['name'];
		$email=$_POST['email'];
		$cell=$_POST['cell'];
		$pass=$_POST['pass'];
		$photo=$_FILES['photo'];

		if(empty($name) || empty($email) || empty($cell)|| empty($pass) || empty($photo)){
			$msg='<p class="alert alert-danger alert-dismissible fade show" role="alert"> All fields are required!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </p>';
		}
		else{
			$stu -> createNewStudent($name,$email,$cell,$pass,$photo);
			header('location:index.php');
		}

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
<!--Isseting Form-->

	
	<div class="wrap-table w-100 p-3">
	<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#UserModal">
  Add New User
</button>
<a class="btn btn-outline-primary" href="#">Back</a>
<br>
<br>
<?php
	if(isset($msg)){
	echo $msg;
	}
?>
<br>
		<div class="card-shadow">	
			<div class="card-body input-group">
				<form class="input-group" action="" method="POST">
					<h2 class="me-3">All Data</h2>
					<input name="search" type="search" class="form-control" placeholder="Search">
					<button name="searchbtn" class="btn btn-outline-primary" type="submit">Search</button>
				</form>
			</div>
				<table class="table table-success table-striped text-success">
					<thead>
						<tr>
							<th ></th>
							<th class="col-sm-1">Name</th>
							<th class="col-sm-2">Email</th>
							<th class="col-sm-1">Cell</th>
							<th class="col-sm-2">User Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
						<tr>
							<td><?php  ?></td>
							<td><?php  ?></td>
							<td><?php  ?></td>
							<td><?php  ?></td>
							<td><?php  ?></td>
							<td>
								<a class="btn btn-sm btn-primary" href="show.php?show_id=<?php?>">View</a>
								<a class="btn btn-sm btn-warning" href="edit.php?edit_id=<?php?>">Edit</a>
								<a class="btn btn-sm btn-danger delete_btn" href="?delete_id=<?php?>&photo=<?php ?>">Delete</a>
							</td>
						</tr>
				
					</tbody>
				</table>
			</div>
		</div>
	</div>
<!--User Modal-->
<div class="modal fade" id="UserModal" tabindex="-1" aria-labelledby="UserModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UserModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control mb-2" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control mb-2" type="text">
					</div>

					<div class="form-group">
						<label for="">Phone</label>
						<input name="cell" class="form-control mb-2" type="text">
					</div>
					
					<div class="form-group">
						<label for="">Password</label>
						<input name="pass" class="form-control mb-2" type="text">
					</div>

					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="form-control mb-2" type="file">
					</div>
					<div class="modal-footer">
        	<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        	<input name="add" type="submit" value="Add" class="btn btn-primary">
      		</div>
      </div>
    </div>
  </div>
</div>

	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/script.js"></script>

</body>
</html>