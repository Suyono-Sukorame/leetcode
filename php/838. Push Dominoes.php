class Solution {

/**
 * @param String $dominoes
 * @return String
 */
function pushDominoes($dominoes) {
    $n = strlen($dominoes);
    $leftForce = array_fill(0, $n, 0);
    $rightForce = array_fill(0, $n, 0);

    $force = 0;
    for ($i = 0; $i < $n; $i++) {
        if ($dominoes[$i] == 'R') {
            $force = $n;
        } elseif ($dominoes[$i] == 'L') {
            $force = 0;
        } else {
            $force = max($force - 1, 0);
        }
        $leftForce[$i] = $force;
    }

    $force = 0;
    for ($i = $n - 1; $i >= 0; $i--) {
        if ($dominoes[$i] == 'L') {
            $force = $n;
        } elseif ($dominoes[$i] == 'R') {
            $force = 0;
        } else {
            $force = max($force - 1, 0);
        }
        $rightForce[$i] = $force;
    }

    $result = '';
    for ($i = 0; $i < $n; $i++) {
        if ($leftForce[$i] == $rightForce[$i]) {
            $result .= '.';
        } elseif ($leftForce[$i] > $rightForce[$i]) {
            $result .= 'R';
        } else {
            $result .= 'L';
        }
    }

    return $result;
}
}