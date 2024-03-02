class Solution {

/**
 * @param String[] $words
 * @return Integer
 */
function numSpecialEquivGroups($words) {
    $groups = array();
    
    foreach ($words as $word) {
        $count = array_fill(0, 52, 0);
        for ($i = 0; $i < strlen($word); $i++) {
            $index = ord($word[$i]) - ord('a') + 26 * ($i % 2);
            $count[$index]++;
        }
        $key = implode(",", $count);
        $groups[$key] = true;
    }
    
    return count($groups);
}
}
