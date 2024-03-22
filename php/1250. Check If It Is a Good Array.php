class Solution {

/**
 * @param Integer[] $nums
 * @return Boolean
 */
function isGoodArray($nums) {
    $gcd = $nums[0]; 
    
    foreach ($nums as $num) {
        $gcd = $this->gcd($gcd, $num);
        if ($gcd == 1) {
            return true;
        }
    }
    
    return $gcd == 1;
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
