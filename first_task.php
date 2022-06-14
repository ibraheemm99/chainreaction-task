<?php

function sortArray($array)
{
    if (!$length = count($array)) {
        return $array;
    }
    for ($i = 0; $i < $length - 1; $i++) {
        if ($array[$i] > $array[$i + 1]) {
            // Swapping the elements.
            $tmp = $array[$i];
            $array[$i] = $array[$i + 1];
            $array[$i + 1] = $tmp;
            $i = -1;
        }
    }

    return $array;
}

print_r(sortArray(array(9, 5, 7, 8, 6, 4, 3, 2, 1, 0)));
