class Solution {

/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function rearrangeArray($nums) {
    $positives = [];
    $negatives = [];
    
    foreach ($nums as $num) {
        if ($num > 0) {
            $positives[] = $num;
        } else {
            $negatives[] = $num;
        }
    }
    
    $result = [];
    $pIndex = 0;
    $nIndex = 0;
    $n = count($nums);
    
    if (count($positives) > count($negatives)) {
        list($positives, $negatives) = array($negatives, $positives);
    }
    
    for ($i = 0; $i < $n; $i++) {
        if ($i % 2 == 0) {
            $result[] = $positives[$pIndex++];
        } else {
            $result[] = $negatives[$nIndex++];
        }
    }
    
    return $result;
}
}
