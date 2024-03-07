class Solution {

function powerfulIntegers($x, $y, $bound) {
    $result = [];
    $i = 0;
    
    while (pow($x, $i) <= $bound) {
        $j = 0;
        while (pow($x, $i) + pow($y, $j) <= $bound) {
            $sum = pow($x, $i) + pow($y, $j);
            $result[$sum] = $sum;
            if ($y == 1) break;
            $j++;
        }
        if ($x == 1) break;
        $i++;
    }
    
    return array_values($result);
}
}
