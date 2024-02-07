class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function rob($nums) {
    $count = count($nums);
    
    if ($count === 1) {
        return $nums[0];
    }
    
    return max($this->robLinear(array_slice($nums, 0, $count - 1)), $this->robLinear(array_slice($nums, 1)));
}

function robLinear($nums) {
    $dp = [];
    $dp[0] = 0;
    $dp[1] = $nums[0];
    
    for ($i = 2; $i <= count($nums); $i++) {
        $dp[$i] = max($dp[$i - 1], $dp[$i - 2] + $nums[$i - 1]);
    }
    
    return $dp[count($nums)];
}
}
