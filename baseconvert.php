<?php

/* Follows the syntax of base_convert (http://www.php.net/base_convert)
 * Original version created by Michael Renner @ http://www.php.net/base_convert 17-May-2006 03:24
*/
function baseconvert($Value, $FromBase, $ToBase){

	//The input validation
	$Value=ereg_replace("[^A-Za-z0-9]","",(string)$Value);
	$FromBase=(int)$FromBase;
	$ToBase=(int)$ToBase;

	//Make sure ToBase is even valid.
	if($ToBase<2 or $ToBase>62){
		return 0;
	}

	//Make sure ToBase is even valid.
	if($FromBase<2 or $FromBase>62){
		return 0;
	//If we aren't using a case-sensitive base then force uppercase.
	}elseif($FromBase<=36){
		$Value=strtoupper($Value);
	}

	$Map="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
	$FromMap=substr($Map, 0, $FromBase);
	$ToMap=substr($Map, 0, $ToBase);

	$Length=strlen($Value);
	$Result='';
	$Number=array();

	for($i=0;$i<$Length;$i++){
		if(($Number[$i]=strpos($FromMap, $Value{$i}))===false){
			return 0;
		}
	}

	do{
		$Divide=0;
		$NewLen=0;

		for($i=0;$i<$Length;$i++){
			$Divide=$Divide * $FromBase + $Number[$i];

			if($Divide >= $ToBase){
				$Number[$NewLen++]=(int)($Divide / $ToBase);
				$Divide=$Divide % $ToBase;
			}elseif($NewLen > 0){
				$Number[$NewLen++]=0;
			}
		}

		$Length=$NewLen;
		$Result=$ToMap{$Divide}.$Result;
	}while($NewLen!=0);

	return $Result;
}

?>