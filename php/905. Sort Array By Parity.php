class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function sortArrayByParity($nums) {
    $even = [];
    $odd = [];
    
    foreach ($nums as $num) {
        if ($num % 2 == 0) {
            $even[] = $num;
        } else {
            $odd[] = $num;
        }
    }
    
    return array_merge($even, $odd);
}
}
