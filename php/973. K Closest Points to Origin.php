class Solution {

/**
 * @param Integer[][] $points
 * @param Integer $k
 * @return Integer[][]
 */
function kClosest($points, $k) {
    $distances = [];
    foreach ($points as $point) {
        $dist = $point[0] * $point[0] + $point[1] * $point[1];
        $distances[] = ['point' => $point, 'distance' => $dist];
    }
    
    $this->quickSelect($distances, 0, count($distances) - 1, $k);
    
    $result = [];
    for ($i = 0; $i < $k; $i++) {
        $result[] = $distances[$i]['point'];
    }
    
    return $result;
}

function quickSelect(&$distances, $left, $right, $k) {
    if ($left >= $right) return;
    
    $pivotIndex = $this->partition($distances, $left, $right);
    $length = $pivotIndex - $left + 1;
    
    if ($length == $k) {
        return;
    } elseif ($length < $k) {
        $this->quickSelect($distances, $pivotIndex + 1, $right, $k - $length);
    } else {
        $this->quickSelect($distances, $left, $pivotIndex - 1, $k);
    }
}

function partition(&$distances, $left, $right) {
    $pivot = $distances[$right]['distance'];
    $i = $left;
    
    for ($j = $left; $j < $right; $j++) {
        if ($distances[$j]['distance'] <= $pivot) {
            $this->swap($distances, $i, $j);
            $i++;
        }
    }
    
    $this->swap($distances, $i, $right);
    return $i;
}

function swap(&$distances, $i, $j) {
    $temp = $distances[$i];
    $distances[$i] = $distances[$j];
    $distances[$j] = $temp;
}
}
