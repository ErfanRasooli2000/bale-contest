<?php

$n = readline();
$sum = 0;
$l = $n-1;


for ($i=0 ; $i<$n ; $i++)
{
    $numbers = explode( " ",readline());

    for ($j=$l ; $j>=0 ; $j--)
    {
        if ($numbers[$j] == 0)
        {
            $sum += $n - ($j + 1);
            $l = $j;
            break;
        }
        if ($j==0)
        {
            $sum += $n;
        }
    }

}
echo $sum;

