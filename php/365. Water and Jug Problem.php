class Solution {

/**
 * @param Integer $jug1Capacity
 * @param Integer $jug2Capacity
 * @param Integer $targetCapacity
 * @return Boolean
 */
function canMeasureWater($jug1Capacity, $jug2Capacity, $targetCapacity) {
    if ($targetCapacity == 0) return true;
    
    if ($jug1Capacity + $jug2Capacity < $targetCapacity) return false;
    
    return $targetCapacity % $this->gcd($jug1Capacity, $jug2Capacity) == 0;
}

function gcd($a, $b) {
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}
}
