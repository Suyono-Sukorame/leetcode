class Solution {

/**
 * @param Integer[][] $people
 * @return Integer[][]
 */
function reconstructQueue($people) {
    usort($people, function($a, $b) {
        if ($a[0] != $b[0]) {
            return $b[0] - $a[0];
        } else {
            return $a[1] - $b[1];
        }
    });
    
    $result = [];
    
    foreach ($people as $person) {
        array_splice($result, $person[1], 0, [$person]);
    }
    
    return $result;
}
}
