<?php

/**
 * In integer array of nums, return true if appears twice, else return false
 */
$nums = [1, 2, 3, 4, 5, 6, 9];

function checkDupli($nums)
{
	$values = [];
	for($i = 0; $i < count($nums); $i++)
	{
		if(in_array($nums[$i], $values))
		{
			return true;
		}else{
			$values[] = $nums[$i];
		}
	}
	return false;
}


function checkDupli2($nums)
{
	$sets = [];
	foreach($nums as $num)
	{
		if(isset($sets[$num]))
		{
			return true;
		}else{
			$sets[$num] = true;
		}

	}
	return false;
}

checkDupli2($nums);

/** 
 * to solve it in linier time complixity we can use set
 * */