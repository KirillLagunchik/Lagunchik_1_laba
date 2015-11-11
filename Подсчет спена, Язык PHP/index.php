<?php
	
function cocktailSorting($a) //$a
  
{
	$n = count($a);
	$counter=0;
	$left = 0;
	$right = $n - 1;
	do {
		$counter = $counter +2;
		for ($i = $left; $i < $right; $i++) {
			if ($a[$i] > $a[$i + 1]) {
				list($a[$i], $a[$i + 1]) = array($a[$i + 1], $a[$i]);
			}
		}
		$right -= 1;
		for ($i = $right; $i > $left; $i--) {
			if ($a[$i] < $a[$i - 1]) {
				list($a[$i], $a[$i - 1]) = array($a[$i - 1], $a[$i]);
			}
		}
		$left += 1;
	} while ($left <= $right);
	echo $counter.' ';
	return $a;
}

function DoBubbleSort($array)
{
	$counter=0;
	$temp = 0;
	for ($i = 0; $i < count($array) - 1; $i++)
	{
		for ($j = 0; $j < count($array) - $i - 1;$j++ )
		{
			if ($array[$j] > $array[$j+1]) 
			{
				$temp = $array[$j];
				$array[$j] = $array[$j+1];
				$array[$j+1] = $temp;
			}
			$counter++;
		}
	}
	echo $counter.' ';
	return $array;
}

function CopyNewElements($OldArray, $NewArray)
{
	for ($i = 0; $i < count($OldArray); $i++)
	{
		$NewArray[$i] = intval($OldArray[$i]);
	}
	return $NewArray;
}

function PrintAllElements($argm, $message)
{
	echo $message.' ';
	echo '<br>';
	
/*
$a
*/
#$a
$h = 0;
for ($i = 0; $i < count($argm); $i++)
		echo $argm[$i].' ';
	echo '<br>';
}
	


function quicksorting(&$array, $l=0, $r=0,&$counter=0) 
{
	echo $counter.' ';
    if($r === 0) 
		$r = count($array)-1;
    $i = $l;
    $j = $r;
    $x = $array[($l + $r) / 2];
	
    do 
	{
		$counter = $counter + 2;
        
		while ($array[$i] < $x) 
			$i++;
		
        while ($array[$j] > $x) 
			$j--;
		
        if ($i <= $j) 
		{
            if ($array[$i] > $array[$j])
			{
                list($array[$i], $array[$j]) = array($array[$j], $array[$i]);
            }
			
			$i++;
            $j--;
        }
    } 
	
	while ($i <= $j);
	
    if ($i < $r) 
	{
		quicksorting ($array, $i, $r, $counter);
	}

    if ($j > $l) 
	{
		quicksorting ($array, $l, $j, $counter);
	}
	
	
	
	return $array;
	
}
//MAIN PROGRAMM
$FileContents = explode(" ", file_get_contents($_SERVER['DOCUMENT_ROOT'].'\src.txt'));

$BasicIntArray = array();

$BasicIntArray = CopyNewElements($FileContents, $BasicIntArray);

PrintAllElements($BasicIntArray, "Source array");

$BubleSortedArray = array();

$BubleSortedArray = DoBubbleSort($BasicIntArray);

PrintAllElements($BubleSortedArray, "Array is bubblesorted");

$CoctailSortedArray = array();

$CoctailSortedArray = cocktailSorting($BasicIntArray);

PrintAllElements($CoctailSortedArray, "Array is coctailsorted");

$QuickSortedArray = array();

$QuickSortedArray = quicksorting($BasicIntArray);

PrintAllElements($QuickSortedArray, "Array is quicksorted");




?>