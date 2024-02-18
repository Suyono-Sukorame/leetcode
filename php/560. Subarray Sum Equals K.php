class Solution {

/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function subarraySum($nums, $k) {
    $cumulativeSum = 0;
    $sumCount = array();
    $sumCount[$cumulativeSum] = 1;
    
    $countToReturn = 0;
    
    foreach ($nums as $num) {
        $cumulativeSum += $num;
        $result = $cumulativeSum - $k;
        if (array_key_exists($result, $sumCount)) {
            $countToReturn += $sumCount[$result];
        }
        if (array_key_exists($cumulativeSum, $sumCount)) {
            $sumCount[$cumulativeSum] += 1;
        } else {
            $sumCount[$cumulativeSum] = 1;
        }
    }
    
    return $countToReturn;
}
}
