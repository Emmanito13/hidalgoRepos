<?php
date_default_timezone_set('America/Mexico_City') ;
include('lib/lib.php');
require_once("conexion.php");
$conexion = conexion();

$idE = $_GET['idE'];
$year = date('Y');
$cadenaConta = utf8_decode("Recibí de ABARROTERA HIDALGO DE TEHUACÁN S.A. DE C.V., la cantidad anotada en este recibo, por concepto de pago de PRIMA VACACIONAL, que en el mismo se indica; manifestando bajo protesta de decir la verdad que disfrute del periodo vacacional conforme a la Ley Federal del Trabajo me correspondia, además hago constar que no se me adeuda a la fecha cantidad alguna por tales conceptos.");
$sqlUpdate = "UPDATE birthday SET estatus = 'pagado' WHERE idE = '$idE' AND year = '$year'";
$resultUp = mysqli_query($conexion,$sqlUpdate); 

class PDF extends FPDF{
    function Header()
    {
        $this->SetFont('Arial','B',13);
        $this->Cell(200,10,utf8_decode('ABARROTERA HIDALGO DE TEHUACÁN S.A. DE C.V.'),"B",0,'C');
        $this->Ln(10);

    }
}

$sqlSelect="SELECT E.idE,E.Nombre,E.Apellidos,T.Nlista,D.nombre as departamento,I.SueldoImss FROM 
empleado as E,trabajo AS T,departamento as D,imss as I, birthday as B WHERE 
E.idE = T.idE AND T.idDepartamento = D.idDepa AND E.idE = I.idE AND E.idE = B.idE AND B.year = '$year' AND B.idE = $idE;";
$result = mysqli_query($conexion,$sqlSelect);

$pdf = new PDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont("Arial",'I',10);
$pdf->Cell(190,10,"RECIBO DE PAGO DE VACACIONES 2022, DEL PERIODO COMPRENDIDO POR LOS SGUIENTES DIAS:","T",1,'C');
$pdf->SetFont("Arial",'B',8);
$pdf->Cell(190,5,'Datos del empleado:',0,1,'C',1);
$pdf->SetFont("Arial",'',8);
$pdf->SetFillColor(255,255,255);

$row=mysqli_fetch_array($result);
$sueldoImss = $row['SueldoImss'];
$nombre = $row['Nombre'];
$apellidos = $row['Apellidos'];
$depa = $row['departamento'];
$pdf->SetFont("Arial",'B',8);
$pdf->Cell(15,5,'Nombre: ',0,0,'L',1);
$pdf->SetFont("Arial",'',8);
$pdf->Cell(95,5,$nombre ." ". $apellidos ,0,1,'L',1);
$pdf->SetFont("Arial",'B',8);
$pdf->Cell(8,5,'No : ',0,0,'L',1);
$pdf->SetFont("Arial",'',8);
$pdf->Cell(95,5,$row['Nlista'],0,1,'L',1);
$pdf->SetFont("Arial",'B',8);
$pdf->Cell(23,5,'Departamento: ',0,0,'L',1);
$pdf->SetFont("Arial",'',8);
$pdf->Cell(95,5,$depa,0,1,'L',1);
$pdf->SetFont("Arial",'B',8);
$pdf->Cell(23,5,'Salario diario: ',0,0,'L',1);
$pdf->SetFont("Arial",'',8);
$pdf->Cell(95,5,$sueldoImss,0,1,'L',1);
$pdf->SetFont("Arial",'B',8);
$pdf->Cell(30,5,utf8_decode('Fecha de impresión:'),0,0,'L',1);
$pdf->SetFont("Arial",'',8);
$pdf->Cell(95,5,date("d-m-Y"),0,1,'L',1);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont("Arial",'B',8);
$pdf->Cell(190,5,'Desglose:',0,1,'C',1);

$pdf->SetFont("Arial",'',8);
$pdf->SetFillColor(255,255,255);

$pdf->Cell(38,5,'CANT. DIAS:',0,0,'L',1);
$pdf->Cell(38,5,'CONCEPTO:',0,0,'L',1);
$pdf->Cell(38,5,'PERCEPCIONES:',0,0,'L',1);
$pdf->Cell(38,5,'DEDUCCIONES',0,0,'L',1);
$pdf->Cell(38,5,'TOTAL:',0,1,'L',1);
$pdf->Cell(35,5,"1",0,0,'L',1);
$pdf->Cell(38,5,utf8_decode("Bono de cumpleaños"),0,0,'L',1);
$pdf->Cell(40,5,"$ 200",0,0,'C',1);
$pdf->Cell(25,5,"$ -",0,0,'L',1);
$pdf->SetFont("Arial",'B',8);
$pdf->Cell(40,5,"$ 200",0,1,'C',1);
$pdf->Cell(35,5,"",0,1,'L',1);
$pdf->SetFont("Arial",'',8);
$pdf->MultiCell(190,5,$cadenaConta,1,1,'C');
$pdf->Cell(190,3,'',"T",1,'L',1);
$pdf->Cell(47.5,20,'FIRMA DEL TRABAJADOR',"R",0,'C',1);
$pdf->Cell(47.5,20,'',1,0,'L',1);
$pdf->Cell(47.5,20,'HUELLA:',"R",0,'C',1);
$pdf->Cell(47.5,20,'',1,1,'L',1);


ob_end_clean();
$pdf->Output();

?>