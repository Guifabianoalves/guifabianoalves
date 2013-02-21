<?php 	
	class Dna {
		private $dna;
		private $protein;
		private $aminoAcid;

		public function __construct() {
	        $this->sequence     = '';
	        $this->protein = '';
	        $this->lenght = 0;
	        $this->aminoAcid = array(
				'AAA' => 'F',	'AAG' => 'F',	
				'AAT' => 'L',	'AAC' => 'L',	'GAA' => 'L',	'GAG' => 'L',	'GAT' => 'L',	'GAC' => 'L',	
				'TAA' => 'I',	'TAG' => 'I',	'TAT' => 'I',	
				'TAC' => 'M',	
				'CAA' => 'V',	'CAG' => 'V',	'CAT' => 'V',	'CAC' => 'V',	
				'AGA' => 'S',	'AGG' => 'S',	'AGT' => 'S',	'AGC' => 'S',	
				'GGA' => 'P',	'GGG' => 'P',	'GGT' => 'P',	'GGC' => 'P',	
				'TGA' => 'T',	'TGG' => 'T',	'TGT' => 'T',	'TGC' => 'T',	
				'CGA' => 'A',	'CGG' => 'A',	'CGT' => 'A',	'CGC' => 'A',	
				'ATA' => 'Y',	'ATG' => 'Y',	
				'ATT' => '*',	'ATC' => '*',	
				'GTA' => 'H',	'GTG' => 'H',	
				'GTT' => 'Q',	'GTC' => 'Q',	
				'TTA' => 'N',	'TTG' => 'N',	
				'TTT' => 'K',	'TTC' => 'K',	
				'CTA' => 'D',	'CTG' => 'D',	
				'CTT' => 'E',	'CTC' => 'E',	
				'ACA' => 'C',	'ACG' => 'C',	
				'ACT' => '*',	
				'ACC' => 'W',	
				'GCA' => 'R',	'GCG' => 'R',	'GCT' => 'R',	'GCC' => 'R',	
				'TCA' => 'S',	'TCG' => 'S',	
				'TCT' => 'R',	'TCC' => 'R',	
				'CCA' => 'G',	'CCG' => 'G',	'CCT' => 'G',	'CCC' => 'G',	
			);
	    }

		public function search($sequence) {
			
			$this->sequence = trim($sequence['sequence']);
			$this->lenght = strlen($this->sequence);
			if (!($this->lenght % 3))
			{
				if (preg_match('/^([ATGCatcg]+)$/', $this->sequence))
				{
					$this->sequence = str_split($this->sequence);

					for ($i=0 ; $i<=$this->lenght ; $i=$i+3)
					{
						$cmp = $this->sequence[$i].$this->sequence[$i+1].$this->sequence[$i+2];
						
						foreach ($this->aminoAcid as $key => $value) {
							if (!strcasecmp ($key, $cmp))
							{
								$this->protein .= $value;
							}
						};
					}
				}
			}

			return $this->protein;
		}
	}	
?>