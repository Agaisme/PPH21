<?php 

namespace Tax\PPH21;

/**
* Iteration The Tax
*/
class Calculator
{
	
	public function calculate($pkpSetahun, $penghasilanBruto, $iuranPensiunThtJht, $netoSebelumnya, $ptkp)
	{

		$iterationTax 	= new TaxIteration();
		$selisih 	= 0;
		$iteration 	= 0;


		/*Iteration*/
		if ($selisih !== 0.00) {
			while ( $selisih !== 0.00) {

				/*First Initiate*/
				if ($selisih == 0.00) {
					$tunjanganPph 	= $iterationTax->calcPph($pkpSetahun);
				}

				$tunjanganPph	= $tunjanganPph + $selisih;
				$bruto 			= $penghasilanBruto + $tunjanganPph;
				$jabatan		= $iterationTax->calcJabatan($bruto);
				$neto			= $bruto - $jabatan - $iuranPensiunThtJht;
				$pkp			= $neto + $netoSebelumnya - $ptkp;
				$rulePph 		= $iterationTax->taxRule($pkp);
				$selisih		= $rulePph - $tunjanganPph;
				$iteration ++;
			}
		}

		$result = array(
				"Tunjangan PPh"				=>	$tunjanganPph,
				"Penghasilan Bruto"			=>	$bruto,
				"Tunjangan Jabatan"			=>	$jabatan, 
				"Penghasilan Neto"			=>	$neto,
				"Penghasilan Kena Pajak"	=>	$pkp, 
				"PPh"						=>	$rulePph,  
				"Selisih"					=>	$selisih,
				"Jumlah Iterasi"			=>	$iteration
		);
		
		return $result;
	}
}

?>