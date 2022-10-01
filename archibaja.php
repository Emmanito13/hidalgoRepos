<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Buscador</title>
<style type="text/css">

		
.fondo {
	background-color: #ccc;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 19 px;
	color: #grey;
	list-style-position: outside;
	list-style-type: circle;
	background-position: 30px 20px;
}



div#M2
	{ 
	width: 500px;
	margin-top:50px;
	
	}
	div #M2
	{ 
	width: 200px;
	margin-top:50px;
	
	}
	
div#M2 ul
    {
		
	list-style:none;
		
	
	}	
	div#M2 ul li
    {
		margin-top:12px;
		font-size:15px;
		font-family:Arial Black;
		color:black;
		background-color:#0CF;
		width:180;
		padding-top:10px;
		padding-bottom:10px;
		border-radius:0px 20px 20px 0px;
		   padding-left:20px;
         box-shadow: 5px 2px 10px #E9E9E9;
         -webkit-transition: padding-left .3s;
	
	}	
	div#M2 ul li:hover {
    padding-left: 50px;
     }
	 
	h1 {
    padding: 0px 0px 10px 50px;
    display: block;

	font-size: 11px;
	font-color:white;
}
	 
#ol {
	color: #FFF;
	font-size: 16px;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	text-align: center;
}

</style>

</head>

<body class="fondo">
<p><img src="archivoG.jpg" width="1020" height="115" alt="banner XD" /></p>
<div id="Menu">
    <ul>
	
	
	
	
 <?PHP
require_once 'conexion.php';
$conexion = conexion();
    $Consulta="select Fecha, Nombre, Apellidos, idE from baja, empleado where Empleado_idE=idE";
    $Lista= mysqli_query($conexion,$Consulta);
 ?>
         <br>
		 <center><h2>Archivo de Personal</h2></center>
		  <div id="M2">
     <ul>  
		 <a href="index.php" target="_blank"><li>Regresar</li></a>
     </ul>
			</div>
		 
		 <form>
		 <ul>
         <table border=2 cellpadding=2 cellspacing=0>
             <tr>
             <th colspan=6> Personal activo </th>
             <tr>
             <th> Fecha de baja </th><th> Nombre del ex empleado </th><th> Opciones </th>
             </tr>
         <?php
     while($row= mysqli_fetch_array($Lista))
{    $T=$row['idE'];
	$Temp0=$row['Fecha'];
        $Temp1=$row['Nombre'];
        $Temp2=$row['Apellidos'];
        $T3= $Temp1." ".$Temp2;

        echo "<tr>
         <td align='center'> $Temp0 </td>
         <td> $T3 </td>
		 <td> <a href=detalles.php?va=$T> ver... </a> </td>
      </tr>";
}
?>
  
   <table>
   </ul>
   </form>
</body>
</html>