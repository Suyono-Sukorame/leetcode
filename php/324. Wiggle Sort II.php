class Solution {

/**
 * @param Integer[] $nums
 * @return NULL
 */
function wiggleSort(&$nums) {
    $n = count($nums);
    
    $median = $this->findKthLargest($nums, (int)(($n + 1) / 2));
    
    $left = 0;
    $right = $n - 1;
    $i = 0;
    while ($i <= $right) {
        if ($nums[$this->newIndex($i, $n)] > $median) {
            $this->swap($nums, $this->newIndex($left++, $n), $this->newIndex($i++, $n));
        } elseif ($nums[$this->newIndex($i, $n)] < $median) {
            $this->swap($nums, $this->newIndex($right--, $n), $this->newIndex($i, $n));
        } else {
            $i++;
        }
    }
}

function findKthLargest(&$nums, $k) {
    $left = 0;
    $right = count($nums) - 1;
    while ($left <= $right) {
        $pivotIndex = $this->partition($nums, $left, $right);
        if ($pivotIndex == $k - 1) {
            return $nums[$pivotIndex];
        } elseif ($pivotIndex > $k - 1) {
            $right = $pivotIndex - 1;
        } else {
            $left = $pivotIndex + 1;
        }
    }
    return -1;
}

function partition(&$nums, $left, $right) {
    $pivot = $nums[$right];
    $i = $left - 1;
    for ($j = $left; $j < $right; $j++) {
        if ($nums[$j] > $pivot) {
            $i++;
            $this->swap($nums, $i, $j);
        }
    }
    $this->swap($nums, $i + 1, $right);
    return $i + 1;
}

function newIndex($index, $n) {
    return (1 + 2 * $index) % ($n | 1);
}

function swap(&$nums, $i, $j) {
    $temp = $nums[$i];
    $nums[$i] = $nums[$j];
    $nums[$j] = $temp;
}
}
