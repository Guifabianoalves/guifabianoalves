<?php 	
	class Rna {
		private $sequence;
		private $protein;
		public $aminoAcid;
		private $lenght;

		public function __construct() {
	        $this->sequence     = '';
	        $this->protein = array();
	        $this->lenght = 0;
	        $this->aminoAcid = array(
				'UUU' => array('F' => 'Phenylalanine'), 'UUC' => array('F' => 'Phenylalanine'),	
				'UUA' => array('L' => 'Leucine'), 'UUG' => array('L' => 'Leucine'), 'CUU' => array('L' => 'Leucine'), 'CUC' => array('L' => 'Leucine'), 'CUA' => array('L' => 'Leucine'),	'CUG' => array('L' => 'Leucine'),	
				'AUU' => array('I' => 'Isoleucine'),	'AUC' => array('I' => 'Isoleucine'),	'AUA' => array('I' => 'Isoleucine'),	
				'AUG' => array('M' => 'Methionine'),	
				'GUU' => array('V' => 'Valine'), 'GUC' => array('V' => 'Valine'), 'GUA' => array('V' => 'Valine'), 'GUG' => array('V' => 'Valine'),	
				'UCU' => array('S' => 'Serine'), 'UCC' => array('S' => 'Serine'), 'UCA' => array('S' => 'Serine'), 'UCG' => array('S' => 'Serine'),	
				'CCU' => array('P' => 'Proline'), 'CCC' => array('P' => 'Proline'), 'CCA' => array('P' => 'Proline'), 'CCG' => array('P' => 'Proline'),	
				'ACU' => array('U' => 'Threonine'), 'ACC' => array('T' => 'Threonine'), 'ACA' => array('T' => 'Threonine'), 'ACG' => array('T' => 'Threonine'),	
				'GCU' => array('A' => 'Alanine'), 'GCC' => array('A' => 'Alanine'), 'GCA' => array('A' => 'Alanine'), 'GCG' => array('A' => 'Alanine'),	
				'UAU' => array('Y' => 'Tyrosine'), 'UAC' => array('Y' => 'Tyrosine'),	
				'UAA' => array('*' => 'Stop Codon'), 'UAG' => array('*' => 'Stop Codon'),	
				'CAU' => array('H' => 'Histidine'), 'CAC' => array('H' => 'Histidine'),	
				'CAA' => array('Q' => 'Glutamine'), 'CAG' => array('Q' => 'Glutamine'),	
				'AAU' => array('N' => 'Asparagine'), 'AAC' => array('N' => 'Asparagine'),	
				'AAA' => array('K' => 'Lysine'), 'AAG' => array('K' => 'Lysine'),	
				'GAU' => array('D' => 'Aspartic acid'), 'GAC' => array('D' => 'Aspartic acid'),	
				'GAA' => array('E' => 'Glutamic acid'), 'GAG' => array('E' => 'Glutamic acid'),	
				'UGU' => array('C' => 'Cysteine'), 'UGC' => array('C' => 'Cysteine'),	
				'UGA' => array('*' => 'Stop Codon'),	
				'UGG' => array('W' => 'Tryptophan '),	
				'CGU' => array('R' => 'Arginine'), 'CGC' => array('R' => 'Arginine'), 'CGA' => array('R' => 'Arginine'), 'GCC' => array('R' => 'Arginine'),	
				'AGU' => array('S' => 'Serine'), 'AGC' => array('S' => 'Serine'),	
				'AGA' => array('R' => 'Arginine'), 'AGG' => array('R' => 'Arginine'),	
				'GGU' => array('G' => 'Glycine'), 'GGC' => array('G' => 'Glycine'), 'GGA' => array('G' => 'Glycine'), 'GGG' => array('G' => 'Glycine'),	
			);
	    }

		public function search($sequence) {
			
			$this->sequence = trim($sequence['sequence']);
			$this->lenght = strlen($this->sequence);
			if (!($this->lenght % 3))
			{
				if (preg_match('/^([AUGCaucg]+)$/', $this->sequence))
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
					return 'A cadeia deve possuir apenas A, U, G e C.';
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