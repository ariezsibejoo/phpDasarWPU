<?php 
session_start();
require "functions.php";

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id= $id");
	$row = mysqli_fetch_assoc($result);

	// cel cookie dan username
	if( $key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}


}

if ( isset($_SESSION["login"]) ) {
	header("Location:index.php");
	exit;
}




if (isset($_POST["login"])) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {
		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// SET SESSION
			$_SESSION["login"] = true;

			// CEK REMEMBER ME
			if (isset($_POST['remember'])) {
				// buat cookie
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("Location: index.php");
			exit;
		}

	}

	$error = true;

}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- my css -->
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-6 bg-light p-5">
<h1 class="text-center mb-4">Halaman Login</h1>
<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic;">Username / password salah</p>
	<?php ENDIF; ?>
	<form action="" method="post">
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" id="username" placeholder="Username" name="username">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="password" placeholder="Password" name="password">
	</div>
	<div class="form-group form-check">
		<input type="checkbox" class="form-check-input" id="remember" name="remember">
		<label class="form-check-label" for="remember">Remember me</label>
	</div>
		<button type="submit" class="btn btn-primary" name="login">Submit</button>
	</form>
	</div>
	</div>
	</div>
<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>