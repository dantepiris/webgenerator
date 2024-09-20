<?php 
   include_once('bd.php');

   session_start();


if (!isset($_SESSION['id_user'])) {
     	header("Location: login.php");
   	
   }


  $msg="";




         $id= $_SESSION['id_user'];


if(isset($_POST['ingresa'])){

	

	$nombre = $_POST['nombre'];
	$concat = $id.$nombre;
	$date = date("d-m-y");


	$exis = "SELECT * FROM `webs` WHERE dominio = '$concat' ";
	$exisdomi = mysqli_query($conecion,$exis);

	if ($exisdomi-> num_rows == 0) {

		$inser= "INSERT INTO `webs`(`idWeb`, `idUsuario`, `dominio`, `fechaCreacion`) VALUES (NULL,'$id','$concat','$date')";
		$exisinser = mysqli_query($conecion,$inser);
		$msg="guardado correctamente<br>";

		$retorno = shell_exec("./wix.sh {$concat}" );
		shell_exec(" zip -r {$concat} {$concat}" );
}else{
			echo "El dominio ya ha sido encontrado en la base de datos.";
		}
	}

	if ($_SESSION['admin'] == TRUE) {
		if ($_SESSION['admin']) {
			$ssql3 = "SELECT * FROM webs";
			$resu = mysqli_query($conecion, $ssql3);
			if (mysqli_num_rows($resu) >= 1) {
	    		while ($fila = mysqli_fetch_assoc($resu)) {
        			$link = $fila['dominio'];
        			echo "<a href='$link'> $link </a>";
        			echo "<a href='$link.zip'> Descargar web </a>";
     				echo "<a href='panel.php?dominiu={$link}'> Eliminar web </a>";
        			echo "<br>";
   				}
			}
		}
	}elseif($_SESSION['admin'] == FALSE){
		$ssql3 = "SELECT * FROM webs WHERE idUsuario = '$id'";
		$resu = mysqli_query($conecion, $ssql3);
		if (mysqli_num_rows($resu) >= 1) {
	    	while ($fila = mysqli_fetch_assoc($resu)) {
        		$link = $fila['dominio'];
        		echo "<a href='$link'> $link </a>";
        		echo "<a href='$link.zip'> Descargar web </a>";
     			echo "<a href='panel.php?dominiu={$link}'> Eliminar web </a>";
        		echo "<br>";
   			}
		}
	}
		

	if (isset($_GET['dominiu'])) {
		$dimini = $_GET['dominiu'];
		$deletequery = "DELETE FROM webs WHERE dominio = '$dimini' ";
		$resdelete = mysqli_query($conecion, $deletequery);
		shell_exec("rm -r $dimini");
		shell_exec("rm -r $dimini.zip");
		header("Location:panel.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel</title>
</head>
<body>

	<h1>BIENVENIDO A TU PANEL </h1>
	<form method="POST">

	genera tu web:<input type="text" name="nombre"><br>
	<input type="submit" name="ingresa" value="Ingresar"><br> <br>
	</form>
	<?php echo $msg;?><br>

	<a href="logout.php">cerrar sesion de<?php echo $_SESSION['id_user']; ?> </a>



</body>
</html>