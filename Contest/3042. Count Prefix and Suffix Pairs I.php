class Solution {

/**
 * @param String[] $words
 * @return Integer
 */
function countPrefixSuffixPairs($words) {
    $ans = 0;
    
    for ($i = 0; $i < count($words) - 1; $i++) {
        for ($j = $i + 1; $j < count($words); $j++) {
            if ($this->isPrefix($words[$i], $words[$j])) {
                $ans++;
            }
        }
    }
    
    return $ans;
}

function isPrefix($a, $b) {
    $n = strlen($a);
    return substr($b, 0, $n) == $a && substr($b, -$n) == $a;
}
}
