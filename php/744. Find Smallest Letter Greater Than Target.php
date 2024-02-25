class Solution {

/**
 * @param String[] $letters
 * @param String $target
 * @return String
 */
function nextGreatestLetter($letters, $target) {
    $n = count($letters);
    $left = 0;
    $right = $n - 1;
    
    if ($target >= $letters[$n - 1]) {
        return $letters[0];
    }
    
    while ($left < $right) {
        $mid = $left + intval(($right - $left) / 2);
        if ($letters[$mid] <= $target) {
            $left = $mid + 1;
        } else {
            $right = $mid;
        }
    }
    
    if ($letters[$left] > $target) {
        return $letters[$left];
    } else {
        return $letters[$left + 1];
    }
}
}
