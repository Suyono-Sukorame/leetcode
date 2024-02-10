class Solution {

/**
 * @param Integer[] $distance
 * @return Boolean
 */
function isSelfCrossing($distance) {
    $n = count($distance);
    if ($n < 4) return false;
    
    for ($i = 3; $i < $n; $i++) {
        if ($distance[$i] >= $distance[$i - 2] && $distance[$i - 1] <= $distance[$i - 3]) return true;
        if ($i >= 4 && $distance[$i - 1] == $distance[$i - 3] && $distance[$i] + $distance[$i - 4] >= $distance[$i - 2]) return true;
        if ($i >= 5 && $distance[$i - 2] >= $distance[$i - 4] && $distance[$i] + $distance[$i - 4] >= $distance[$i - 2] && $distance[$i - 1] <= $distance[$i - 3] && $distance[$i - 1] + $distance[$i - 5] >= $distance[$i - 3]) return true;
    }
    
    return false;
}
}

$solution = new Solution();
$distance1 = [2,1,1,2];
var_dump($solution->isSelfCrossing($distance1));

$distance2 = [1,2,3,4];
var_dump($solution->isSelfCrossing($distance2));

$distance3 = [1,1,1,2,1];
var_dump($solution->isSelfCrossing($distance3));
