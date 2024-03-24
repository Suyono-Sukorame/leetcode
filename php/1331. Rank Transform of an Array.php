class Solution {

/**
 * @param Integer[] $arr
 * @return Integer[]
 */
function arrayRankTransform($arr) {
    $sortedArr = $arr;
    sort($sortedArr);
    
    $rankMap = [];
    $rank = 1;
    
    foreach ($sortedArr as $num) {
        if (!isset($rankMap[$num])) {
            $rankMap[$num] = $rank;
            $rank++;
        }
    }
    
    $result = [];
    
    foreach ($arr as $num) {
        $result[] = $rankMap[$num];
    }
    
    return $result;
}
}
