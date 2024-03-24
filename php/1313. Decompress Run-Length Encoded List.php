class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function decompressRLElist($nums) {
    $result = array();
    $n = count($nums);
    
    for ($i = 0; $i < $n; $i += 2) {
        $freq = $nums[$i];
        $val = $nums[$i + 1];
        
        for ($j = 0; $j < $freq; $j++) {
            $result[] = $val;
        }
    }
    
    return $result;
}
}
