class Solution {

/**
 * @param Integer[] $tokens
 * @param Integer $power
 * @return Integer
 */
function bagOfTokensScore($tokens, $power) {
    sort($tokens);
    
    $score = 0;
    $maxScore = 0;
    $left = 0;
    $right = count($tokens) - 1;
    
    while ($left <= $right) {
        if ($power >= $tokens[$left]) {
            $power -= $tokens[$left++];
            $score++;
            $maxScore = max($maxScore, $score);
        } elseif ($score > 0) {
            $power += $tokens[$right--];
            $score--;
        } else {
            break;
        }
    }
    
    return $maxScore;
}
}
