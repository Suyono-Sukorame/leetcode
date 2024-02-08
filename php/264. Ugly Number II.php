class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function nthUglyNumber($n) {
    $ugly = array(1);
    $i2 = $i3 = $i5 = 0;
    
    while (count($ugly) < $n) {
        $nextUgly = min($ugly[$i2] * 2, $ugly[$i3] * 3, $ugly[$i5] * 5);
        $ugly[] = $nextUgly;
        
        if ($nextUgly == $ugly[$i2] * 2) $i2++;
        if ($nextUgly == $ugly[$i3] * 3) $i3++;
        if ($nextUgly == $ugly[$i5] * 5) $i5++;
    }
    
    return $ugly[$n - 1];
}
}
