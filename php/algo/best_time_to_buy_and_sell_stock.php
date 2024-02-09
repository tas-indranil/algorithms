<?php
$prices = [7, 1, 5, 3, 6, 4];

//function profitCalculate(array $arr)
//{
//    $profit = 0;
//    $left = 0;
//
//    for($i = 0; $i < count($arr); $i++)
//    {
//        echo "Previous: left : {$arr[$left]} => right {$arr[$i]}\n";
//        if($arr[$i] > $arr[$left])
//        {
//            echo "left : {$arr[$left]} => right {$arr[$i]}\n";
//            $profit = max($profit, $arr[$i] - $arr[$left]);
//            echo $profit."\n";
//        }else{
//            $left = $i;
//        }
//    }
//    return $profit;
//}
$prices = [7, 1, 5, 3, 6, 12, 48, 4, 3];
function profitCalculate(array $prices)
{
    $profit = 0;
    $left = 0;
    echo "\n\n\n\n";

    for ($i = 1; $i < count($prices); $i++)
    {
        echo "Previous: left : {$prices[$left]} => right {$prices[$i]}\n";
        if($prices[$i] > $prices[$left])
        {
            echo "value of profit: ".$profit."\n";
            $profit = max($profit, $prices[$i] - $prices[$left]);
            echo "value of profit now: ".$profit."\n";
        }else{
            echo "value of i : ".$i."\n";
            echo "value of left : ".$left."\n";
            $left = $i;
            echo "value of left now : ".$left."\n";
            echo "\n\n";
        }
    }
    return $profit;
}


print_r(profitCalculate($prices));