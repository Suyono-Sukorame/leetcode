class Solution {

/**
 * @param String $s
 * @return Integer
 */
function countSubstrings($s) {
    $count = 0;
    $n = strlen($s);
    
    for ($i = 0; $i < $n; $i++) {
        $count += $this->expandAroundCenter($s, $i, $i);
        
        $count += $this->expandAroundCenter($s, $i, $i + 1);
    }
    
    return $count;
}

function expandAroundCenter($s, $left, $right) {
    $count = 0;
    
    while ($left >= 0 && $right < strlen($s) && $s[$left] == $s[$right]) {
        $count++;
        $left--;
        $right++;
    }
    
    return $count;
}
}

$solution = new Solution();
echo $solution->countSubstrings("abc") . "\n"; // Output: 3
echo $solution->countSubstrings("aaa") . "\n"; // Output: 6
