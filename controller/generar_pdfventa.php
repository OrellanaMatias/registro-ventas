<?php
    require('../pdf/fpdf.php');

    //Cabecera de página
    class PDF extends FPDF{
        function Header(){
            //Arial bold 15
            $this->SetFont('Arial', 'B', 10);
            //Mover a la derecha
            $this->Cell(60);
            //Titulo
            $this->Cell(70, 10, 'Reporte de ventas en PDF', 1, 0, 'C');
            //Salto de línea
            $this->Ln(20);

            //Encabezado base
            $this->Cell(40, 10, 'Nombre', 1, 0, 'C', 0);
            $this->Cell(30, 10, 'DNI', 1, 0, 'C', 0);
            $this->Cell(70, 10, 'Productos', 1, 0, 'C', 0);
            $this->Cell(15, 10, 'P. Unit.', 1, 0, 'C', 0);
            $this->Cell(20, 10, 'Cantidad', 1, 0, 'C', 0);
            $this->Cell(15, 10, 'P. Total', 1, 1, 'C', 0);
        }
        //Pie de pagina
        function Footer(){
            //Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            //Posicion a 1,5cm del final
            $this->SetY(-15);
            //Nummero de página
            $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
        }
    }
    
    $pdf = new PDF();

    //Agregar pagina, crear página y definir estilo
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'I', 8);


    //Llamar a la base de datos y sacar la consulta
    include_once "../model/conexion.php";
    $sql = $conexion->query("SELECT * FROM ventas");

    /*
    Utiliza un bucle while para recorrer cada fila del conjunto de resultados 
    y agrega los datos de cada venta al documento PDF utilizando los métodos Cell 
    y Ln de la clase FPDF.
    */
    while ($row = $sql->fetch_assoc()) {
        $pdf->Cell(40, 6, $row['nombres'], 1, 0, 'C', 0);
        $pdf->Cell(30, 6, $row['dni'], 1, 0, 'C', 0);
        $pdf->Cell(70, 6, $row['producto'], 1, 0, 'C', 0);
        $pdf->Cell(15, 6, $row['precio_unit'], 1, 0, 'C', 0);
        $pdf->Cell(20, 6, $row['cantidad'], 1, 0, 'C', 0);
        $pdf->Cell(15, 6, $row['precio_total'], 1, 1, 'C', 0);
        // ...
    }
    $pdf->Ln();

    //Mostrar PDF
    $pdf->Output();
?>