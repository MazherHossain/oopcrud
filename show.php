<?php
	include_once "vendor/autoload.php";
	use App\Controllers\Student;//To use the Student class from Student.php inside Controllers
	$stu = new Student;
	if(isset($_GET['student_id'])){
		$id=$_GET['student_id'];
		$single_student=$stu -> showStudent($id);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $single_student -> name; ?></title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/css/all.css">
  <link rel="stylesheet" href="assets/css/style3.css">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-lg-4 mx-auto mt-5">
      <div class="card">
        <img class="shw shadow" src="photos/students/<?php echo $single_student->photo; ?>" alt="">
        <div class="card-body">
        <h2 class="text-center"><?php echo $single_student->name; ?></h2>
          <table class="table">
            <tr>
              <td>Name</td>
              <td><?php echo $single_student->name; ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?php echo $single_student->email; ?></td>
            </tr>
            <tr>
              <td>Phone Number</td>
              <td><?php echo $single_student->cell; ?></td>
            </tr>
          </table>
          <a class="btn btn-primary btn-sm" href="index.php">Back</a>
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