class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function singleNumber($nums) {
    $xor = 0;
    foreach ($nums as $num) {
        $xor ^= $num;
    }
    
    $rightmostSetBit = $xor & (-$xor);
    
    $group1 = 0;
    $group2 = 0;
    foreach ($nums as $num) {
        if (($num & $rightmostSetBit) != 0) {
            $group1 ^= $num;
        } else {
            $group2 ^= $num;
        }
    }
    
    return [$group1, $group2];
}
}
