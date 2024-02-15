class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function reversePairs($nums) {
    return $this->mergeSort($nums, 0, count($nums) - 1);
}

function mergeSort(&$nums, $left, $right) {
    if ($left >= $right) return 0;
    
    $mid = ($left + $right) >> 1;
    $count = $this->mergeSort($nums, $left, $mid) + $this->mergeSort($nums, $mid + 1, $right);
    
    $j = $mid + 1;
    for ($i = $left; $i <= $mid; $i++) {
        while ($j <= $right && $nums[$i] > 2 * $nums[$j]) {
            $j++;
        }
        $count += $j - ($mid + 1);
    }
    
    $this->merge($nums, $left, $mid, $right);
    
    return $count;
}

function merge(&$nums, $left, $mid, $right) {
    $temp = [];
    $i = $left;
    $j = $mid + 1;
    $k = 0;
    
    while ($i <= $mid && $j <= $right) {
        if ($nums[$i] <= $nums[$j]) {
            $temp[$k++] = $nums[$i++];
        } else {
            $temp[$k++] = $nums[$j++];
        }
    }
    
    while ($i <= $mid) {
        $temp[$k++] = $nums[$i++];
    }
    
    while ($j <= $right) {
        $temp[$k++] = $nums[$j++];
    }
    
    for ($i = $left; $i <= $right; $i++) {
        $nums[$i] = $temp[$i - $left];
    }
}
}
