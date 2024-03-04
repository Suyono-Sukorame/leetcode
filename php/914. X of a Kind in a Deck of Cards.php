class Solution {

/**
 * @param Integer[] $deck
 * @return Boolean
 */
function hasGroupsSizeX($deck) {
    $count = array_count_values($deck);
    
    $gcd = $count[$deck[0]];
    foreach ($count as $value) {
        $gcd = $this->gcd($gcd, $value);
        if ($gcd == 1) {
            return false;
        }
    }
    
    return true;
}

function gcd($a, $b) {
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}
}
