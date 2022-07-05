<?php
$PDF_HEADER_TITLE = 'listado-Viviendas';
$PDF_MARGIN_HEADER = 30;
$PDF_MARGIN_TOP = 40;
$PDF_MARGIN_LEFT = 5;
$PDF_MARGIN_RIGHT = 6;
$PDF_PAGE_ORIENTATION = 'l';
$PDF_PAGE_FORMAT = 'LEGAL';
// Include the main TCPDF library (search for installation path).
require_once('assets/lib/TCPDF/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        $PDF_HEADER_TITLE = 'Lista de Viviendas';
        $LOGO = 'assets/image/logo.png';
        // Logo
        $image_file = $LOGO;
        $this->Image($image_file, 10, 12, 25, '', 'png', '', 'T', true, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 24);
        // Title
        $this->Cell(0, 10, $PDF_HEADER_TITLE, 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF($PDF_PAGE_ORIENTATION, PDF_UNIT, $PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Estudiante');
$pdf->SetTitle($PDF_HEADER_TITLE);
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin($PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists('assets/lib/TCPDF/lang/spa.php')) {
    require_once('assets/lib/TCPDF/lang/spa.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// Set some content to print
    $html = '
<table class="table" border="1" cellspacing="0">
        <thead>
            <tr align="center">
                <th width="4%">N</th>
                <th width="9%">CEDULA</th>
                <th width="12%">NOMBRE</th>
                <th width="12%">APELLIDO</th>
                <th width="8%">TELEFONO</th>
                <th width="9%">TIPO DE VIVIENDA</th>
                <th width="9%">CONDICION</th>
                <th width="9%">TIPO TECHO</th>
                <th width="8%">TIPO PISO</th>
                <th width="5%">AGUA</th>
                <th width="5%">LUZ</th>
                <th width="10%">AGUAS NEGRAS</th>

            </tr>
        </thead>
</table> 
';
    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    include_once('conexion.php');

    $consulta = "SELECT
	r.cedula,
	r.nombre,
	r.apellido,
	r.telefono,
	v.tipoVivienda,
	v.condicion,
	v.tipoTecho,
	v.tipoPiso,
	v.agua,
	v.luz,
	v.aguasNegras
FROM
	general as r
	JOIN vivienda as v ON v.cedula = r.cedula";

    $resultado = mysqli_query($conexion, $consulta);


    while ($row = mysqli_fetch_array($resultado)) {
        $item += 1;
        $id = $row['cedula'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $tlf = $row['telefono'];
        $tipo = $row['tipoVivienda'];
        $condicion = $row['condicion'];
        $tipoTecho = $row['tipoTecho'];
        $tipoPiso = $row['tipoPiso'];
        $agua = $row['agua'];
        $luz = $row['luz'];
        $aguasNegras = $row['aguasNegras'];


        $html2 = '
    <table class="table">
            <tr align="center">
                    <td width="4%">' . $item . '</td>
                    <td width="9%">' . $id . '</td>
                    <td width="12%">' . $nombre . '</td>
                    <td width="12%">' . $apellido . '</td>
                    <td width="8%">' . $tlf . ' </td>
                    <td width="9%">' . $tipo . ' </td>
                    <td width="9%">' . $condicion . ' </td>
                    <td width="9%">' . $tipoTecho . ' </td>
                    <td width="8%">' . $tipoPiso . ' </td>
                    <td width="5%">' . $agua . ' </td>
                    <td width="5%">' . $luz . ' </td>
                    <td width="10%">' . $aguasNegras . ' </td>

            </tr>
    </table
                    ';
                    // output the HTML content
$pdf->writeHTML($html2, true, false, true, false, '');
    }

mysqli_free_result($resultado);
mysqli_close($con);



// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean();
$pdf->Output($PDF_HEADER_TITLE . '.pdf', 'I');
                
                //============================================================+
// END OF FILE
//============================================================+
