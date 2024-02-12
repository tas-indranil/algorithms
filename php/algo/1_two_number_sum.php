<?php

// $values = [-4, -1, 1, 3, 5, 6, 8, 11, 18, 2, 7];
$arr = [72, 80, 26, 74, 3, 38, 73, 52, 78, 76, 18, 34, 53, 14, 66, 71, 92, 47, 81, 82, 
            88, 50, 96, 22, 70, 65, 5, 41, 99, 7, 69, 11, 60, 4, 55, 20, 95, 54, 86, 45, 84, 94, 90, 
            75, 37, 79, 67, 31, 57, 2, 61, 85, 17, 35, 87, 91, 83, 36, 98, 16, 43, 25, 6, 30, 62, 89, 
            56, 24, 46, 33, 51, 93, 15, 44, 27, 39, 28, 29, 64, 42, 48, 10, 21, 63, 13, 1, 12, 40, 100, 
            8, 19, 58, 49, 59, 32, 97, 68, 9, 77, 23];

$values = [1, 13, 21, 7, 15, 18, 6, 9];

// //Solution 1
// $start = microtime(true);
// foreach($values as $l_value)
// {
//    foreach($values as $r_value)
//    {
//        if(($r_value + $l_value) == 10 && $r_value != $l_value)
//        {
//            echo $r_value." + ".$l_value." = 10 \n";
//            break;
//        }
//    }
// }
// $end = microtime(true);
// $exec_time1 = $end - $start;
// echo "\nTotal execution time: ".$exec_time." seconds\n";


// Solution 2
// $start = microtime(true);
//
// $target = 20;
//
// foreach ($values as $index => $l_value)
// {
//     $val = $target - $l_value;
//     if(in_array($val, $values))
//     {
//         $key["index1"] = (int)array_keys($values, $val);
//         $key["value1"] = $val;
//         $key["val2"] = $index;
//         $key["value2"] = $l_value;
//         break;
//     }
// }
//
// print_r($key);
//
// $end = microtime(true);
// $exec_time = $end - $start;
// echo "\nTotal execution time: ".$exec_time." seconds\n";



// solution 3
/*
function twoSum($nums, $target) {
$ans = array(0, 0);
$map = array();

for ($i = 0; $i < count($nums); $i++) {
$diff = $target - $nums[$i];

if (!array_key_exists($diff, $map)) {
$map[$nums[$i]] = $i;
} else {
$ans[0] = $i;
$ans[1] = $map[$diff];
}
}
return $ans;
}

$val = twoSum($values, 20);
print_r($val);
 */


 /*
$start = microtime(true);

function twoSum(array $mainArr, int $target)
{
    $ans = [0,0];
    $map = [];
    for($i = 0; $i < count($mainArr); $i++)
    {
        $diff = $target - $mainArr[$i];
        if(!array_key_exists($diff, $map))
        {
            $map[$mainArr[$i]] = $i;
        }else{
            $ans[0] = $i;
            $ans[1] = $mainArr[$i];
            $ans[2] = $map[$diff];
            $ans[3] = $diff;
            $ans[4] = "Target ".$mainArr[$i]." + ".$diff." :".$target;
        }
    }
    return $ans;
}

print_r(twoSum($values, 142));

$end = microtime(true);
$exec_time = $end - $start;
echo "\nTotal execution time: ".$exec_time." seconds\n";
*/

$valuesGiven = [1, 13, 21, 7, 15, 18, 6, 9];
$target = 33;


function arrayTwoSum($values, $target)
{
    $map = [];

    foreach($values as $index => $num)
    {
        $remain = $target - $num;
        if(isset($map[$remain]))
        {
            print_r($map);
            echo "\n";
            return [$remain, $num];
        }
        $map[$num] = $index;
    }
    return "Nothing";
}
print_r(arrayTwoSum($valuesGiven, $target));