<?php
	include_once "vendor/autoload.php";
	use App\Controllers\Student;//To use the Student class from Student.php inside Controllers
	$stu = new Student;
  if(isset($_GET['edit_id'])){
		$id=$_GET['edit_id'];
	}
  else{
    header('location:index.php');
  }
  if(isset($_POST['add'])){
		//Get values
		$name=$_POST['name'];
		$email=$_POST['email'];
		$cell=$_POST['cell'];
    $old_photo=$_POST['old_photo'];
		$new_photo=$_FILES['new_photo'];
		

		if(empty($name) || empty($email) || empty($cell)){
			$msg='<p class="alert alert-danger alert-dismissible fade show" role="alert"> All fields are required!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </p>';
		}
		else{
			$stu -> updateStudentData($name,$email,$cell,$old_photo,$new_photo,$id);
		}

	}
  $edit_data=$stu-> editStudent($id);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $edit_data->name; ?></title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/css/all.css">
  <link rel="stylesheet" href="assets/css/style3.css">
</head>
<body>
<br>
  <div class="container">
    <div class="row">
      <div class="col-log-5 mx-auto">
      <a class="btn btn-outline-primary" href="index.php">Back</a>
      <br>
      <h5 class="text-center"><?php echo $edit_data->name; ?></h5>
      <?php
      if(isset($msg)){
        echo $msg;
        }
        ?>
      <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="">Name</label>
      <input name="name" class="form-control mb-2" value="<?php echo $edit_data->name; ?>" type="text">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input name="email" class="form-control mb-2" value="<?php echo $edit_data->email; ?>" type="text">
    </div>
    <div class="form-group">
      <label for="">Cell</label>
      <input name="cell" class="form-control mb-2" value="<?php echo $edit_data->cell; ?>" type="text">
    </div>
    <div class="form-group">
    <img style="width:200px;" src="photos/students/<?php echo $edit_data->photo; ?>" alt="">
    <br>
      <label for=""></label>
      <input name="new_photo" class="form-control mb-2" type="file">
      <input name="old_photo" class="form-control mb-2" value="<?php echo $edit_data->photo; ?>" type="hidden">
    </div>
    <input name="add" type="submit" value="Update" class="btn btn-primary">
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  

	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/script.js"></script>

</body>
</html>