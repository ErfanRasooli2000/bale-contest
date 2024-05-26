<?php


echo "Input numbers :\n";

$numbers = explode(" ",readline());
$n = count($numbers);
$counts = [];

$max = floor($n/2);

$answer = 0;
$hasNumber = false;
$count = 0;

foreach ($numbers as $number)
{
    $counts[$number] = !isset($counts[$number]) ? 1 :  $counts[$number] + 1;

    if ($counts[$number]>$max)
    {
        $hasNumber = true;
        $count = $counts[$number];
        $answer = $number;
    }
}

if ($hasNumber)
{
    echo "$answer has been shown $count times \n";
}
else
{
    echo "no number found";
}
