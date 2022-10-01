<table id="tabla1" class="table-responsive table-hover" style="font-size: 16px">
    <thead style="color: black;">

        <th> Numero Lista </th>
        <th> Nombre y Apellidos </th>
        <th> Salario Diario </th>
        <th> Dias Lab. </th>
        <th> Salario Neto </th>
        <th> Productividad </th>
        <th> Puntualidad </th>
        <th> Bono Encargado </th>
        <th> Deducciones </th>
        <th> Total </th>
    </thead>
    <tbody>
        <?php
        require_once 'conexion.php';
        $conexion = conexion();
        $Consulta = "select * from empleado where Estatus='activo'  and Nlista <= 600 order by  Nlista";
        $Lista = mysqli_query($conexion, $Consulta);
        $acumulador = 0.00;
        while ($row = mysqli_fetch_array($Lista)) {
            $T = $row['idE'];
            $Temp = $row['Nlista'];
            $Temp2 = $row['Nombre'];
            $Temp3 = $row['Apellidos'];


            $TX = $row['BonoJ'];
            $Temp4 = $row['SalarioD'];
            $Temp5 = $row['Sueldo'];
            $TY = $Temp5 - $TX;
            $BonDia = $TX / 7;
            $dias = $row['Dlaborados'];
            $st = $TY / 7;
            $suel = $st * $dias;

            $ex1 = $Temp4 * $dias;
            $ex2 = $suel - $ex1;
            $pp = $ex2 / 2;

            $r0 = round($BonDia * $dias, 2);
            $r1 = round($pp, 2);
            $r2 = round($suel + $r0, 2);
            $r3 = round($Temp4 * $dias, 2);
            $r4 = round($Temp5 - $r2, 2);

            $acumulador = $r2 + $acumulador;

            echo "<tr>
         <td align='center'> $Temp </td>
         <td> $Temp2 $Temp3 </td>

            <td  align='center'>$ <input type='button'  onclick='fum($T)'  value=$Temp4> </td>
            <td  align='center'> <input type='button'  onclick='fun($T)'  value=$dias> </td>
       <td  align='center'>$ $r3 </td>

         <td  align='center'>$ $r1 </td>
         <td  align='center'>$ $r1 </td>
         <td  align='center'>$ <input type='button'  onclick='fux($T)'  value=$r0> </td>
         <td  align='center'>$ $r4 </td>
         <td  align='center'>$ $r2 </td>



      </tr>";
        }
        $acu = number_format(round($acumulador, 2), 2, ',', ' ');


        echo "<h4 style='font-weight: italic'>Total de Empleados en nomina: <label style='font-size: 23px;font-weight: normal'>$acu</label> </h4>";
        ?>
        <input type="image" src="pictures/imprimir.png" alt="Submit" title="Imprimir" width="30" height="30" onclick=" location ='buscafechax.php'">
        <!-- <div id='M2'>
            <ul>
                <a href='index.php'>
                    <li>Regresar</li>
                </a>
                <a href='buscafechax.php'>
                    <li>Imprimir Nomina</li>
                </a>
            </ul>
        </div>" -->
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('#tabla1').DataTable({
            "language": {
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "lengthMenu": "Mostrar _MENU_ registros",
                "search": "Buscar:",
                "info": "Mostrar página _PAGE_ de _PAGES_",
                "emptyTable": "No hay documentos",
                "zeroRecords": "No hay coincidencias",
                "infoFiltered": "(filtrados _MAX_ del total de registros)"
            }
        });
    });
</script>

<script type="text/javascript">
    function fun(numero) {
        var nombre;
        nombre = prompt('Numero de dias Laborados "Ejem. 5.5 para 5 dias y medio" ', '');
        if (nombre < 7.1) {
            window.location = "camdi.php?id=".concat(numero, "&dia=", nombre);
        } else {
            window.confirm("Debes introducir un numero 0 y 7. Puede contener decimales ")
        }
    }
</script>


<script type="text/javascript">
    function fum(numero) {
        var nombre;
        nombre = prompt('Nuevo salario Diario, "los cambios seran permanentes"', '');
        if (nombre > 73.1) {
            window.location = "camsal.php?id=".concat(numero, "&sal=", nombre);
        } else {
            window.confirm("Debes introducir un salario mayor a $73.00 Puede contener decimales ")
        }
    }
</script>


<script type="text/javascript">
    function fux(numero) {
        var nombre;
        nombre = prompt('Nuevo Bono correspondiente a los 7 dias laborados', '');
        if (nombre < 3000) {
            window.location = "cambo.php?id=".concat(numero, "&sal=", nombre);
        } else {
            window.confirm("Debes introducir una camtidad valida ")
        }
    }
</script>