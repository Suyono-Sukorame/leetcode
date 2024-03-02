class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function sumSubseqWidths($nums) {
    $mod = 1000000007;
    sort($nums);
    $n = count($nums);
    $sum = 0;
    $power_of_two = array(1);
    
    for ($i = 1; $i < $n; $i++) {
        $power_of_two[$i] = ($power_of_two[$i - 1] * 2) % $mod;
    }
    
    for ($i = 0; $i < $n; $i++) {
        $sum = ($sum + ($power_of_two[$i] - $power_of_two[$n - $i - 1]) * $nums[$i]) % $mod;
    }
    
    return $sum;
}
}
