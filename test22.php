<?php

$input = array(1,2,3,4,5,6);

$filter_even = function ($item) {
    return ($item % 2) == 0;
};

$output2 = array_filter($input, function ($item) {
    return ($item % 2) == 0;
});

//print_r($output);


function criteria_greater_than($min)
{
    return function($item) use ($min) {
        return $item > $min;
    };
}

$output2 = array_filter($input, criteria_greater_than(3));

print_r($output2); // items > 3