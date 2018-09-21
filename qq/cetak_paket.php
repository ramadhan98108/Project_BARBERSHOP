<?php
require('assets/lib/fpdf.php');
class PDF extends FPDF
{
	function Header()
	{
	    $this->SetFont('Arial','B',30);
	    $this->Cell(30,10,'BARBER.GO');

	    $this->Ln(10);
	    $this->SetFont('Arial','i',10);
	    $this->cell(30,10,'Jl mojoroto, SOLO');


	    $this->Ln(5);
	    $this->SetFont('Arial','i',10);
	    $this->cell(30,10,'Telp/Fax : 0812-345-432-123');
	    $this->Line(10,40,200,40);


	    $this->Ln(5);
	    $this->SetFont('Arial','i',10);
	    $this->cell(30,10,'Data Paket');

	    $this->cell(130);
	    $this->SetFont('Arial','',10);
	    $this->cell(30,10,'Kediri, '.date("d-m-Y").'');

	    $this->Line(10,40,200,40);
	}
	function data_barang(){
		mysql_connect("localhost","root","");
		mysql_select_db("s");
		$data=mysql_query("SELECT paket.id_paket,paket.nama_paket,paket.keteragan,paket.harga_jual ORDER BY paket.id_paket DESC");
		while ($r=  mysql_fetch_array($data))
		        {
		            $hasil[]=$r;
		        }
		        return $hasil;
		        
	}
	function set_table($header,$data){
		$this->SetFont('Arial','B',9);
        $this->Cell(10,7,"No",1);
        $this->Cell(60,7,$header[1],1);
        $this->Cell(12,7,$header[0],1);
        $this->Cell(24,7,$header[2],1);
        $this->Cell(27,7,$header[3],1);
        $this->Cell(27,7,$header[4],1);
        $this->Cell(30,7,$header[5],1);
    	$this->Ln();

    	$this->SetFont('Arial','',9);
    	$no=1;
	    foreach($data as $row)
	    {
	        $this->Cell(10,7,$no++,1);
	        $this->Cell(60,7,$row['nama_paket'],1);
	        $this->Cell(12,7,$row['keterangan'],1);
	        $this->Cell(27,7,"Rp. ".number_format($row['harga_jual']),1);
	        $this->Ln();
	    }
	}
}

$pdf = new PDF();
$pdf->SetTitle('Cetak Data Paket');

$header = array( 'Nama Paket','Keterangan','Harga Jual');
$data = $pdf->data_barang();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(20);
$pdf->set_table($header,$data);
$pdf->Output('','BARBER.GO/Paket/'.date("d-m-Y").'.pdf');
?>