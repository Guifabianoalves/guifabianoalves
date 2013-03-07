<?php 	
	class Dna {
		private $sequence;
		private $protein;
		public $aminoAcid;
		private $lenght;

		public function __construct() {
	        $this->sequence     = '';
	        $this->protein = array();
	        $this->lenght = 0;
	        $this->aminoAcid = array(
				'TTT' => array('F' => 'Phenylalanine'), 'TTC' => array('F' => 'Phenylalanine'),	
				'TTA' => array('L' => 'Leucine'), 'TTG' => array('L' => 'Leucine'), 'CTT' => array('L' => 'Leucine'), 'CTC' => array('L' => 'Leucine'), 'CTA' => array('L' => 'Leucine'),	'CTG' => array('L' => 'Leucine'),	
				'ATT' => array('I' => 'Isoleucine'),	'ATC' => array('I' => 'Isoleucine'),	'ATA' => array('I' => 'Isoleucine'),	
				'ATG' => array('M' => 'Methionine'),	
				'GTT' => array('V' => 'Valine'), 'GTC' => array('V' => 'Valine'), 'GTA' => array('V' => 'Valine'), 'GTG' => array('V' => 'Valine'),	
				'TCT' => array('S' => 'Serine'), 'TCC' => array('S' => 'Serine'), 'TCA' => array('S' => 'Serine'), 'TCG' => array('S' => 'Serine'),	
				'CCT' => array('P' => 'Proline'), 'CCC' => array('P' => 'Proline'), 'CCA' => array('P' => 'Proline'), 'CCG' => array('P' => 'Proline'),	
				'ACT' => array('T' => 'Threonine'), 'ACC' => array('T' => 'Threonine'), 'ACA' => array('T' => 'Threonine'), 'ACG' => array('T' => 'Threonine'),	
				'GCT' => array('A' => 'Alanine'), 'GCC' => array('A' => 'Alanine'), 'GCA' => array('A' => 'Alanine'), 'GCG' => array('A' => 'Alanine'),	
				'TAT' => array('Y' => 'Tyrosine'), 'TAC' => array('Y' => 'Tyrosine'),	
				'TAA' => array('*' => 'Stop Codon'), 'TAG' => array('*' => 'Stop Codon'),	
				'CAT' => array('H' => 'Histidine'), 'CAC' => array('H' => 'Histidine'),	
				'CAA' => array('Q' => 'Glutamine'), 'CAG' => array('Q' => 'Glutamine'),	
				'AAT' => array('N' => 'Asparagine'), 'AAC' => array('N' => 'Asparagine'),	
				'AAA' => array('K' => 'Lysine'), 'AAG' => array('K' => 'Lysine'),	
				'GAT' => array('D' => 'Aspartic acid'), 'GAC' => array('D' => 'Aspartic acid'),	
				'GAA' => array('E' => 'Glutamic acid'), 'GAG' => array('E' => 'Glutamic acid'),	
				'TGT' => array('C' => 'Cysteine'), 'TGC' => array('C' => 'Cysteine'),	
				'TGA' => array('*' => 'Stop Codon'),	
				'TGG' => array('W' => 'Tryptophan '),	
				'CGT' => array('R' => 'Arginine'), 'CGC' => array('R' => 'Arginine'), 'CGA' => array('R' => 'Arginine'), 'GCC' => array('R' => 'Arginine'),	
				'AGT' => array('S' => 'Serine'), 'AGC' => array('S' => 'Serine'),	
				'AGA' => array('R' => 'Arginine'), 'AGG' => array('R' => 'Arginine'),	
				'GGT' => array('G' => 'Glycine'), 'GGC' => array('G' => 'Glycine'), 'GGA' => array('G' => 'Glycine'), 'GGG' => array('G' => 'Glycine'),	
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
						$cmp = strtoupper($cmp);
						if(array_key_exists($cmp, $this->aminoAcid))
						{
							array_push($this->protein, $this->aminoAcid[$cmp]);
						}
					}
				}
				else
				{
					return 'A cadeia deve possuir apenas A, T, G e C.';
				}
			}
			else
			{
				return 'A cadeia deve possuir número de bases divisível por 3.';
			}

			return $this->protein;
		}
	}	
?>