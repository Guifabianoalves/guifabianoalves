<?php 

	$dna = "AAATGCGTAGCGACGTACGGCTACCGAGTGTGATAACGA";
	$protein = "";

	$dna = trim($dna);
	$tamanho = strlen($dna);
	echo "Tamanho da String: ";
	echo $tamanho;
	if (!($tamanho % 3))
	{
		if (preg_match('/^([ATGCatcg]+)$/', $dna))
		{
			$dna = str_split($dna);	
			echo "<br />";
			echo "DNA: ";

			for ($i=0 ; $i<=$tamanho ; $i=$i+3)
			{
				$cmp = $dna[$i].$dna[$i+1].$dna[$i+2];
				echo $cmp." ";
				
				if (!strcasecmp($cmp, "AAA") || !strcasecmp($cmp, "AAG"))
				{
					$protein .= "F";
				}
				else if (!strcasecmp($cmp, "AAT") || !strcasecmp($cmp, "AAC") || !strcasecmp($cmp, "GAA") || !strcasecmp($cmp, "GAG") || !strcasecmp($cmp, "GAT") || !strcasecmp($cmp, "GAC"))
				{
					$protein .= "L";
				}
				else if (!strcasecmp($cmp, "TAA") || !strcasecmp($cmp, "TAG") || !strcasecmp($cmp, "TAT"))
				{
					$protein .= "I";						
				}
				else if (!strcasecmp($cmp, "TAC"))
				{
					$protein .= "M";
				}
				else if (!strcasecmp($cmp, "CAA") || !strcasecmp($cmp, "CAG") || !strcasecmp($cmp, "CAT") || !strcasecmp($cmp, "CAC"))
				{
					$protein .= "V";	
				}
				else if (!strcasecmp($cmp, "AGA") || !strcasecmp($cmp, "AGG") || !strcasecmp($cmp, "AGT") || !strcasecmp($cmp, "AGC")) 
				{
					$protein .= "S";
				}
				else if (!strcasecmp($cmp, "GGA") || !strcasecmp($cmp, "GGG") || !strcasecmp($cmp, "GGT") || !strcasecmp($cmp, "GGC")) 
				{
					$protein .= "P";
				}
				else if (!strcasecmp($cmp, "TGA") || !strcasecmp($cmp, "TGG") || !strcasecmp($cmp, "TGT") || !strcasecmp($cmp, "TGC")) 
				{
					$protein .= "T";
				}
				else if (!strcasecmp($cmp, "CGA") || !strcasecmp($cmp, "CGG") || !strcasecmp($cmp, "CGT") || !strcasecmp($cmp, "CGC")) 
				{
					$protein .= "A";
				}
				else if (!strcasecmp($cmp, "ATA") || !strcasecmp($cmp, "ATG")) 
				{
					$protein .= "Y";
				}
				else if (!strcasecmp($cmp, "ATT") || !strcasecmp($cmp, "ATC")) 
				{
					$protein .= "*";
				}
				else if (!strcasecmp($cmp, "GTA") || !strcasecmp($cmp, "GTG")) 
				{
					$protein .= "H";
				}
				else if (!strcasecmp($cmp, "GTT") || !strcasecmp($cmp, "GTC")) 
				{
					$protein .= "Q";
				}
				else if (!strcasecmp($cmp, "TTA") || !strcasecmp($cmp, "TTG")) 
				{
					$protein .= "N";
				}
				else if (!strcasecmp($cmp, "TTT") || !strcasecmp($cmp, "TTC")) 
				{
					$protein .= "K";
				}
				else if (!strcasecmp($cmp, "CTA") || !strcasecmp($cmp, "CTG")) 
				{
					$protein .= "D";
				}
				else if (!strcasecmp($cmp, "CTT") || !strcasecmp($cmp, "CTC")) 
				{
					$protein .= "E";
				}
				else if (!strcasecmp($cmp, "ACA") || !strcasecmp($cmp, "ACG")) 
				{
					$protein .= "C";
				}
				else if (!strcasecmp($cmp, "ACT")) 
				{
					$protein .= "*";
				}
				else if (!strcasecmp($cmp, "ACC")) 
				{
					$protein .= "W";
				}
				else if (!strcasecmp($cmp, "GCA") || !strcasecmp($cmp, "GCG") || !strcasecmp($cmp, "GCT") || !strcasecmp($cmp, "GCC")) 
				{
					$protein .= "R";
				}
				else if (!strcasecmp($cmp, "TCA") || !strcasecmp($cmp, "TCG")) 
				{
					$protein .= "S";
				}
				else if (!strcasecmp($cmp, "TCT") || !strcasecmp($cmp, "TCC")) 
				{
					$protein .= "R";
				}
				else if (!strcasecmp($cmp, "CCA") || !strcasecmp($cmp, "CCG") || !strcasecmp($cmp, "CCT") || !strcasecmp($cmp, "CCC")) 
				{
					$protein .= "A";
				}
			}

			echo "<br />";
			echo "Protein: ";
			echo $protein;
		}
	}
?>