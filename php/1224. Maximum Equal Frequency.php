class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxEqualFreq($nums) {
    $counts = []; 
    $frequencies = []; 
    $res = 0;
    
    for ($i = 0; $i < count($nums); $i++) {
        $num = $nums[$i];
        if (!isset($counts[$num])) $counts[$num] = 0;
        $counts[$num]++;
        $currentFreq = $counts[$num];
        
        if (!isset($frequencies[$currentFreq])) $frequencies[$currentFreq] = 0;
        $frequencies[$currentFreq]++;
        
        $result = $frequencies[$currentFreq] * $currentFreq;
        
        if ($result == $i + 1 && $i != count($nums) - 1) {
            $res = max($res, $i + 2);
        } elseif ($result == $i) {
            $res = max($res, $i + 1);
        }
    }
    
    return $res;
}
}