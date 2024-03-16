class Solution {

/**
 * @param Integer[] $customers
 * @param Integer[] $grumpy
 * @param Integer $minutes
 * @return Integer
 */
function maxSatisfied($customers, $grumpy, $minutes) {
    $satisfied = 0;
    $max_add_satisfied = 0;
    $add_satisfied = 0;
    
    for ($i = 0; $i < count($customers); $i++) {
        if ($grumpy[$i] == 0) {
            $satisfied += $customers[$i];
        } else {
            $add_satisfied += $customers[$i];
        }
        if ($i >= $minutes && $grumpy[$i - $minutes] == 1) {
            $add_satisfied -= $customers[$i - $minutes];
        }
        $max_add_satisfied = max($max_add_satisfied, $add_satisfied);
    }
    
    return $satisfied + $max_add_satisfied;
}
}
