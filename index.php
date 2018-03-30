<?php 

	require_once('src/TaxIteration.php');
	require_once('src/Calculator.php');

	use Tax\PPH21\Calculator;

	$calculator = new Calculator();


	/*
		Model and Data
	 */
	/*Penghasilan Bruto*/
	$gajiPokokPensiun 	= 48216000.00 ;
	$tunjanganLainnya 	= 33771767.00;
	$honoriumImbalan	= 0.00;
	$premiAsuransi  	= 2502410.40 ;
	$natura				= 0.00;
	$bonusThrTantiem	= 5097500.00;
	$penghasilanBruto 	= 89587677.40 ;

	/*Potongan JHT*/
	$totalJht 		= 964320.00 ;

	/*Potongan JP*/
	$totalJp		= 482160.00 ;

	/*Pengurangan*/
	$biayaJabatan 		= 4479383.87 ; 
	$iuranPensiunThtJht = $totalJht + $totalJp;
	$jumlahPengurangan  = $biayaJabatan + $iuranPensiunThtJht;

	/*Perhitungan PPh 21*/
	$penghasilanNeto		= $penghasilanBruto - $jumlahPengurangan;
	$netoSebelumnya			= 0;
	$penghasilanNetoSetahun = $penghasilanNeto + $netoSebelumnya;
	$ptkp					= 72000000.00 ; 
	$pkpSetahun				= $penghasilanNetoSetahun - $ptkp;

	/*proses*/
	$result 		= $calculator->calculate($pkpSetahun, $penghasilanBruto, $iuranPensiunThtJht, $netoSebelumnya, $ptkp);

	foreach ($result as $key => $value) {
		echo $key."\t\t\t => ".number_format($value, 2)."\n";
	}

?>