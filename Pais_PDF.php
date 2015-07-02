<?php

	require "fpdf/fpdf.php";
	
	class PDF extends FPDF
	{
	}
	
	//Declaracion de la hoja
	$pdf = new PDF('P', 'mm', 'Letter');
	$pdf->SetMargins(20, 18);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	//Datos del titulo
	$pdf->SetTextColor(0x00, 0x00, 0x00);
	$pdf->SetFont ("Arial", "b", 9);
	$pdf->Cell(0, 5, 'Paises de la copa America 2015', 1, 1, 'C');
	
	//Datos de coneccion
	mysql_connect("localhost", "root", "root");
	mysql_select_db("copa_america");
	
	//Mostrar la tabla
	$pdf->Ln();
	
	$pdf->Cell(30, 5, "ID Pais", 1, 0, 'C');
	$pdf->Cell(30, 5, "Nombre", 1, 0, 'C');
	$pdf->Cell(30, 5, "Capital", 1, 1, 'C');
	
	$sql= "SELECT PAIS.* FROM PAIS";
	$rec = mysql_query($sql);
	
	while ($row = mysql_fetch_array($rec))
	{
		$pdf->Cell(30, 5, $row['id_pais'], 1, 0, 'C');
		$pdf->Cell(30, 5, $row['nombre'], 1, 0, 'C');
		$pdf->Cell(30, 5, $row['capital'], 1, 1, 'C');
		
	}


	$pdf->Output(/**/);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>sin título</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.22" />
</head>

<body>
	
</body>

</html>
