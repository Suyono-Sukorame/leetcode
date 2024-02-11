class Solution {

/**
 * @param Integer $a
 * @param Integer[] $b
 * @return Integer
 */
function superPow($a, $b) {
    if (count($b) == 0) return 1;
    
    $last = array_pop($b);
    return ($this->powerWithMod($a, $last, 1337) * $this->powerWithMod($this->superPow($a, $b), 10, 1337)) % 1337;
}

function powerWithMod($a, $b, $mod) {
    if ($b == 0) return 1;
    if ($b == 1) return $a % $mod;

    $power = $this->powerWithMod($a, intdiv($b, 2), $mod);
    $powerWithMod = ($power * $power) % $mod;

    return $b % 2 == 0 ? $powerWithMod : ($powerWithMod * $a) % $mod;
}
}
