<link rel="stylesheet" href="login.css">

<table>
<?php
include('conexion.php');
session_start();

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
	echo "<tr><td colspan='5' align='center'><h1>Bienvenido: $usuarioingresado </h1></td></tr>";
}
else
{
	header('location: login.php');
}
?>
<form method="POST">
<tr><td colspan='5' align="center"><input type="submit" value="Cerrar sesión" name="btncerrar" /></td></tr>
</form>

<tr><td colspan="5" align="center"><h1>Listado de niños en Guardería</h1></td></tr>
<tr>
	<td><label>Nombre (s)</label></td>
	<td><label>Apellido Paterno</label></td>
	<td><label>Apellido Materno</label></td>
	<td><label>Contacto</label></td>
	<td><label>Domicilio</label></td>
</tr>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: index.html');
}
	
$sql="SELECT * FROM ninos";
$result=mysqli_query($conn,$sql);

while($mostrar=mysqli_fetch_array($result))
{
	
?>
<tr> <td><?php echo $mostrar['nombre'] ?>
	<td><?php echo $mostrar['apaterno'] ?>
	<td><?php echo $mostrar['amaterno'] ?>
	<td><?php echo $mostrar['contacto'] ?>
	<td><?php echo $mostrar['domicilio'] ?>

</tr>
<?php
}



?>
</table>
















