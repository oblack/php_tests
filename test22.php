<?php

$input = array(1,2,3,4,5,6);

$filter_even = function ($item) {
    return ($item % 2) == 0;
};

$output = array_filter($input, $filter_even);

print_r($output);
