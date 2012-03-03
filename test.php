<?php

$StartInteration=100000000;
$MaxInterations=250;

$StartBase=2;
$EndBase=36;

$TotalInterations=$MaxInterations*($EndBase-$StartBase+1)^2;

$start1=microtime(true);

include_once("./baseconvert.php");

print("baseconvert\n");

for($i=$StartInteration;$i<$StartInteration+$MaxInterations;$i++){
	for($j=$StartBase;$j<=$EndBase;$j++){
		for($k=$StartBase;$k<=$EndBase;$k++){
			$tmp1=baseconvert($i,$j,$k);
			$tmp2=baseconvert($tmp1,$k,$j);

			// If $i is invalid for $j then $k doesn't matter.
			if($tmp1===false){
				print("\tINVALID:($i,$j,$k) $i is invalid for base $j\n");
				$k=$EndBase+1;
				continue;
			}

			if(((string)$i)===((string)$tmp2)){
//				print("\tSuccess:($i,$j,$k) $i===$tmp2\n");
			}else{
				print("\tFAILURE:($i,$j,$k)=".gettype($tmp1)."($tmp1) $i!==$tmp2\n");
			}
		}
	}
}

$end1=microtime(true);




$start2=microtime(true);

include_once("./unfucked_base_convert.php");

print("unfucked_base_convert\n");

for($i=$StartInteration;$i<$StartInteration+$MaxInterations;$i++){
	for($j=$StartBase;$j<=$EndBase;$j++){
		for($k=$StartBase;$k<=$EndBase;$k++){
			$tmp1=unfucked_base_convert((string)$i,$j,$k);
			$tmp2=unfucked_base_convert((string)$tmp1,$k,$j);

			// If $i is invalid for $j then $k doesn't matter.
			if($tmp1===false){
				print("\tINVALID:($i,$j,$k) $i is invalid for base $j\n");
				$k=$EndBase+1;
				continue;
			}

			if(((string)$i)===((string)$tmp2)){
//				print("\tSuccess:($i,$j,$k) $i===$tmp2\n");
			}else{
				print("\tFAILURE:($i,$j,$k)=".gettype($tmp1)."($tmp1) $i!==$tmp2\n");
			}
		}
	}
}

$end2=microtime(true);




$start3=microtime(true);

print("base_convert\n");

for($i=$StartInteration;$i<$StartInteration+$MaxInterations;$i++){
	for($j=$StartBase;$j<=$EndBase;$j++){
		for($k=$StartBase;$k<=$EndBase;$k++){
			$tmp1=base_convert($i,$j,$k);
			$tmp2=base_convert($tmp1,$k,$j);

			// If $i is invalid for $j then $k doesn't matter.
			if($tmp1===false){
				print("\tINVALID:($i,$j,$k) $i is invalid for base $j\n");
				$k=$EndBase+1;
				continue;
			}

			if(((string)$i)===((string)$tmp2)){
//				print("\tSuccess:($i,$j,$k) $i===$tmp2\n");
			}else{
				print("\tFAILURE:($i,$j,$k)=".gettype($tmp1)."($tmp1) $i!==$tmp2\n");
			}
		}
	}
}

$end3=microtime(true);

$diff1=$end1-$start1;
$diff2=$end2-$start2;
$diff3=$end3-$start3;


print("\n");
print("Final Results after $TotalInterations iterations for each function:\n");
print("\tConverted numbers from $StartInteration to ".($StartInteration+$MaxInterations).".\n");
print("\tUsing base $StartBase to $EndBase then back to $StartBase.\n");
print("\n");
print("\t1) baseconvert : $diff1\n");
print("\t2) unfucked_bc : $diff2\n");
print("\t3) base_convert: $diff3\n");
print("\n");
print("\tDifferences:\n");
print("\t\t1v2\t".abs($diff1-$diff2)."\n");
print("\t\t1v3\t".abs($diff1-$diff3)."\n");
print("\t\t2v3\t".abs($diff2-$diff3)."\n");


