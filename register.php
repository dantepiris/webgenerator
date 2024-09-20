<?php 
  include_once('bd.php');
session_start();



   if (isset( $_SESSION['id_user'])) {
     	header("Location: panel.php");
   	
   }




$msg="";

if(isset($_POST['ingresa'])){

	$user = $_POST['email'];
	$pass = ($_POST['pass']);
	$pas2 = ($_POST['passtwo']);



  	$exisemail = getConection("SELECT email FROM `usuarios` WHERE email = '$user' ");




	if ($exisemail-> num_rows >0) {


			$msg=" este email  ya esta registrado";


		}
			elseif ($pass != $pas2)  {
			


				$msg="Las contraseñas no coinciden, intente de nuevo";

			} else {

				$date = date("d-m-y");


				getConection ("INSERT INTO `usuarios`(`idUsuario`, `email`, `password`, `fechaRegistro`) VALUES (NULL,'{$user}','{$pass}','{$date}')");

				
				
 				 header("Location: login.php");



			}




	}









					
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
</head>
<body>
	<div class="banner">
		<h1>REGISTRARTE ES SIMPLE</h1>
	</div>

	<form method="POST">

		<input type="text" name="email" placeholder="ingrese gmail" >
		<input type="password" name="pass" placeholder="ingrese contraseña" >
		<input type="password" name="passtwo" placeholder="repita contraseña" >
		<input type="submit" name="ingresa" value="registrarse"><br>
		<?php echo $msg; ?><br>

		
	</form>
	
	
</body>
</html>