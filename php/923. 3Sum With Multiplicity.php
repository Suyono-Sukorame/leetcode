class Solution {

/**
 * @param Integer[] $arr
 * @param Integer $target
 * @return Integer
 */
function threeSumMulti($arr, $target) {
    $mod = 1000000007;
    $count = array_fill(0, 101, 0);
    $result = 0;
    
    for ($i = 0; $i < count($arr); $i++) {
        $result = ($result + $count[$target - $arr[$i]]) % $mod;
        
        for ($j = 0; $j < $i; $j++) {
            $sum = $arr[$i] + $arr[$j];
            $count[$sum]++;
        }
    }
    
    return $result;
}
}
