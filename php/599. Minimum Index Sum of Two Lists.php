class Solution {

/**
 * @param String[] $list1
 * @param String[] $list2
 * @return String[]
 */
function findRestaurant($list1, $list2) {
    $indexSum = [];
    $result = [];
    $minIndexSum = PHP_INT_MAX;
    
    foreach ($list1 as $index => $str) {
        $indexSum[$str] = $index;
    }
    
    foreach ($list2 as $index => $str) {
        if (isset($indexSum[$str])) {
            $sum = $index + $indexSum[$str];
            if ($sum < $minIndexSum) {
                $result = [$str];
                $minIndexSum = $sum;
            }
            elseif ($sum == $minIndexSum) {
                $result[] = $str;
            }
        }
    }
    
    return $result;
}
}
