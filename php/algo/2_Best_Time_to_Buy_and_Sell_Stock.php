<?php
$values = [7,1,5,3,6,4];

/**
 * Calculate the maximum profit from buying and selling stocks based on the given prices array.
 *
 * @param array $prices An array of stock prices
 * @return int Maximum profit from buying and selling stocks
 */
function bestTime($prices)
{
    $profit = 0;
    $left = 0;
    for($right = 1; $right < count($prices); $right++)
    {
        if($prices[$right] > $prices[$left])
        {
            $profit = max($profit, $prices[$right]-$prices[$left]);
        }else{
            $left = $right;
        }
    }
    return $profit;
}

echo bestTime($values);