class Solution {

/**
 * @param Integer[][] $dungeon
 * @return Integer
 */
function calculateMinimumHP($dungeon) {
    $m = count($dungeon);
    $n = count($dungeon[0]);
    
    $dp = array_fill(0, $m, array_fill(0, $n, PHP_INT_MAX));
    
    $dp[$m - 1][$n - 1] = max(1, 1 - $dungeon[$m - 1][$n - 1]);
    
    for ($i = $m - 1; $i >= 0; $i--) {
        for ($j = $n - 1; $j >= 0; $j--) {
            if ($i == $m - 1 && $j == $n - 1) continue; // Skip last cell
            $right = ($j == $n - 1) ? PHP_INT_MAX : $dp[$i][$j + 1]; // Minimum health required to reach cell to the right
            $down = ($i == $m - 1) ? PHP_INT_MAX : $dp[$i + 1][$j]; // Minimum health required to reach cell below
            $minHealth = min($right, $down) - $dungeon[$i][$j];
            $dp[$i][$j] = max(1, $minHealth);
        }
    }
    
    return $dp[0][0];
}
}

$solution = new Solution();
$dungeon1 = [[-2,-3,3],[-5,-10,1],[10,30,-5]];
echo $solution->calculateMinimumHP($dungeon1) . "\n"; // Output: 7
$dungeon2 = [[0]];
echo $solution->calculateMinimumHP($dungeon2) . "\n"; // Output: 1
