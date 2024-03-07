class Solution {

public function isRationalEqual($s, $t) {
    return abs($this->valueOf($s) - $this->valueOf($t)) < 1e-9;
}

private $ratios = [1.0, 1.0 / 9, 1.0 / 99, 1.0 / 999, 1.0 / 9999];

private function valueOf($s) {
    if (strpos($s, '(') === false) {
        return floatval($s);
    }

    $leftParenIndex = strpos($s, '(');
    $rightParenIndex = strpos($s, ')');
    $dotIndex = strpos($s, '.');

    $nonRepeating = floatval(substr($s, 0, $leftParenIndex));
    $nonRepeatingLength = $leftParenIndex - $dotIndex - 1;

    $repeating = intval(substr($s, $leftParenIndex + 1, $rightParenIndex - $leftParenIndex - 1));
    $repeatingLength = $rightParenIndex - $leftParenIndex - 1;

    return $nonRepeating + $repeating * pow(0.1, $nonRepeatingLength) * $this->ratios[$repeatingLength];
}
}
