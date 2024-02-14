class Solution {

/**
 * @param Integer[] $nums
 * @return Boolean
 */
function predictTheWinner($nums) {
    return $this->helper($nums, 0, count($nums) - 1, 1) >= 0;
}

function helper($nums, $start, $end, $turn) {
    if ($start == $end) {
        return $turn * $nums[$start];
    }
    
    $startScore = $turn * $nums[$start] + $this->helper($nums, $start + 1, $end, -$turn);
    $endScore = $turn * $nums[$end] + $this->helper($nums, $start, $end - 1, -$turn);
    
    return $turn === 1 ? max($startScore, $endScore) : min($startScore, $endScore);
}
}
