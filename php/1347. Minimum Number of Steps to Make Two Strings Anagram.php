class Solution {

function minSteps($s, $t) {
    $freqS = array_fill(0, 26, 0);
    $freqT = array_fill(0, 26, 0);
    
    $n = strlen($s);
    for ($i = 0; $i < $n; $i++) {
        $index = ord($s[$i]) - ord('a');
        $freqS[$index]++;
    }
    
    for ($i = 0; $i < $n; $i++) {
        $index = ord($t[$i]) - ord('a');
        $freqT[$index]++;
    }
    
    $steps = 0;
    for ($i = 0; $i < 26; $i++) {
        $steps += abs($freqS[$i] - $freqT[$i]);
    }
    
    return $steps / 2;
}
}

$solution = new Solution();
$s = "leetcode";
$t = "practice";
echo $solution->minSteps($s, $t);
