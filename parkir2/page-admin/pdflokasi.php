<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group table
 * @group color
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('vendor\autoload.php');
require_once('vendor\tecnickcom\tcpdf\config\tcpdf_config.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {

	// Load table data from file
	public function LoadData() {
		include 'connect.php';
        $select = "SELECT * FROM lokasi";
        $query = mysqli_query($koneksi, $select);
        return $query;
	}

	// Colored table
	public function ColoredTable($header,$data) {
		// Colors, line width and bold font
		$this->setFillColor(33, 37, 41);
		$this->setTextColor(255,255,255);
		$this->setDrawColor(255,255,255);
		$this->setLineWidth(0.3);
		$this->setFont('helvetica', 'B');
		// Header
		$w = array(30,60,150,40,30,30);
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			$this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		}
		$this->Ln();
		// Color and font restoration
		$this->setFillColor(248, 249, 250);
		$this->setTextColor(0);
		$this->setFont('times');
		// Data
		$fill = 0;
		foreach($data as $row) {
			$this->Cell($w[0], 10, $row["id_lokasi"], 'LR', 0, 'C', $fill);
			$this->Cell($w[1], 10, $row["nama_lokasi"], 'LR', 0, 'L', $fill);
			$this->Cell($w[2], 10, $row["alamat"], 'LR', 0, 'L', $fill);
			$this->Cell($w[3], 10, $row["jam_operasional"], 'LR', 0, 'L', $fill);
            $this->Cell($w[5], 10, $row["tipe"], 'LR', 0, 'C', $fill);
            $this->Cell($w[5], 10, $row["tarif"], 'LR', 0, 'C', $fill);
           
			
			$this->Ln();
			$fill=!$fill;
		}
		$this->Cell(array_sum($w), 0, '', 'T');
	}
}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, ['format' => 'A3'], true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Brian Albert');
$pdf->setTitle('Lokasi');
$pdf->setSubject('Subject brian');
$pdf->setKeywords('keword brian');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 01', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('times', '', 12);

// add a page
$pdf->AddPage();

// column titles
$header = array('Id Lokasi', 'Nama Lokasi', 'Alamat', 'Jam Operasional', 'Tipe', 'Tarif');

// data loading
$data = $pdf->LoadData();

// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('Detail Data Lokasi.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>