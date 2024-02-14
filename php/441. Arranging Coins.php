class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function arrangeCoins($n) {
    return floor(sqrt(2 * $n + 0.25) - 0.5);
}
}
