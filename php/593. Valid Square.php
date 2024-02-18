class Solution {

/**
 * @param Integer[] $p1
 * @param Integer[] $p2
 * @param Integer[] $p3
 * @param Integer[] $p4
 * @return Boolean
 */
function validSquare($p1, $p2, $p3, $p4) {
    $points = [$p1, $p2, $p3, $p4];
    $distances = [];
    
    for ($i = 0; $i < 4; $i++) {
        for ($j = $i + 1; $j < 4; $j++) {
            $distance = $this->calculateDistance($points[$i], $points[$j]);
            if ($distance == 0) return false;
            $distances[] = $distance;
        }
    }
    
    sort($distances);
    
    return $distances[0] == $distances[1] && 
           $distances[1] == $distances[2] &&
           $distances[2] == $distances[3] &&
           $distances[4] == $distances[5]; 
}

function calculateDistance($p1, $p2) {
    return pow($p2[0] - $p1[0], 2) + pow($p2[1] - $p1[1], 2);
}
}
