<?php 

namespace Tax\PPH21;
/**
* PPH 21 Rule
*/
class TaxIteration
{
	public function calcPph(float $pkpSetahun): float
	{

		if ( $pkpSetahun <= 47500000 ) 
		{
			return ($pkpSetahun * 5 / 95);
		}
		elseif ( $pkpSetahun <= 217500000 ) {
			return (( $pkpSetahun - 47500000) * 15 / 85 + 2500000);
		}
		elseif ( $pkpSetahun <= 405000000 ) {
			return (( $pkpSetahun - 217500000 ) * 25 / 75 + 32500000);
		}
		else{
			return (( $pkpSetahun - 405000000 ) * 30 / 70 + 95000000);
		}
	}

	public function calcJabatan(float $penghasilanBruto): float
	{

		if ( 0.05 * $penghasilanBruto >= 60000000 ) {
			return 60000000;
		}
		else{
			return (0.05 * $penghasilanBruto);
		}
	}

	public function taxRule(float $pkp): float
	{

		if ( $pkp <= 50000000 ) {
			return (0.05 * $pkp);
		}
		elseif ( $pkp <= 250000000 ) {
			return (0.05 * 50000000 + 0.15 * ( $pkp - 50000000 ));
		}
		elseif ( $pkp <= 500000000 ) {
			return (0.05 * 50000000 + 0.15 * 200000000 + 0.25 * ( $pkp - 250000000 ));
		}
		else{
			return (0.05 * 50000000 + 0.15 * 200000000 + 0.25 * 250000000 + 0.30 * ( $pkp - 500000000 ));
		}
	}

}

?>