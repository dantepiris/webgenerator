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

		   $ssq = "SELECT * FROM `usuarios` WHERE email = '$user' AND password = '$pass'";
 			 $res = mysqli_query($conecion,$ssq);

 			 $exis = "SELECT email FROM `usuarios` WHERE email = '$user' ";
	     $exisemail = mysqli_query($conecion,$exis);

	     $contra = "SELECT password FROM `usuarios` WHERE password = '$pass' ";
	     $exiscontra = mysqli_query($conecion,$exis);

	   if ($user == 'admin@server.com' && $pass == 'serveradmin') {
			$_SESSION['admin'] = TRUE;
		header("Location: panel.php");
		}else{
			$_SESSION['admin']=FALSE;
			
		}


 			if ($exisemail-> num_rows == 0) {

 				$msg=" este email no esta registrado";

 				

 			} elseif ($res-> num_rows == 0){


 				$msg= "contraseña incorrecto";

 			
 			} else{

 				 while($file = mysqli_fetch_array($res, MYSQLI_ASSOC)){

            $_SESSION['id_user']=$file['idUsuario'];
            echo  $_SESSION['id_user'];
        }



 			 header("Location: panel.php");

 			


 			}



}
					
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<div class="banner">
		<h1>DANTE PIRIS EMANUEL</h1>
	</div>

	<form method="POST">

		<input type="email" name="email" placeholder="ingrese gmail" >
		<input type="password" name="pass" placeholder="ingrese contraseña" >
		<input type="submit" name="ingresa" value="Ingresar"><br>
		<?php echo $msg; ?><br>
		<a href="register.php">Registrarme</a>
		
	</form>

	
	
</body>
</html>