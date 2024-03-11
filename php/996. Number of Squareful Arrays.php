class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function numSquarefulPerms($nums) {
    $count = 0;
    sort($nums);
    $this->backtrack($nums, 0, $count);
    return $count;
}

function backtrack(&$nums, $start, &$count) {
    if ($start == count($nums)) {
        $count++;
        return;
    }
    
    $visited = [];
    for ($i = $start; $i < count($nums); $i++) {
        if (isset($visited[$nums[$i]])) {
            continue;
        }
        if ($start > 0 && !$this->isSquareful($nums[$start - 1], $nums[$i])) {
            continue;
        }
        $visited[$nums[$i]] = true;
        $this->swap($nums, $start, $i);
        $this->backtrack($nums, $start + 1, $count);
        $this->swap($nums, $start, $i);
    }
}

function isSquareful($a, $b) {
    $sum = $a + $b;
    $root = intval(sqrt($sum));
    return $root * $root == $sum;
}

function swap(&$arr, $i, $j) {
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}
}
