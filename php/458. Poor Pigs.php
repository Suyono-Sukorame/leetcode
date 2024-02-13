class Solution {

/**
 * @param Integer $buckets
 * @param Integer $minutesToDie
 * @param Integer $minutesToTest
 * @return Integer
 */
function poorPigs($buckets, $minutesToDie, $minutesToTest) {
    $testsPerPig = floor($minutesToTest / $minutesToDie);
    
    $babi = 0;
    while (pow($testsPerPig + 1, $babi) < $buckets) {
        $babi++;
    }
    
    return $babi;
}
}
