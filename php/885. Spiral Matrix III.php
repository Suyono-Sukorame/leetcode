class Solution {

/**
 * @param Integer $rows
 * @param Integer $cols
 * @param Integer $rStart
 * @param Integer $cStart
 * @return Integer[][]
 */
function spiralMatrixIII($rows, $cols, $rStart, $cStart) {
    $result = array();
    $dr = array(0, 1, 0, -1);
    $dc = array(1, 0, -1, 0);
    $r = $rStart;
    $c = $cStart;
    $step = 0;
    $currentDirection = 0;

    $result[] = array($r, $c);

    while (count($result) < $rows * $cols) {
        if ($currentDirection % 2 == 0) {
            $step++;
        }

        for ($i = 0; $i < $step; $i++) {
            $r += $dr[$currentDirection];
            $c += $dc[$currentDirection];
            if ($r >= 0 && $r < $rows && $c >= 0 && $c < $cols) {
                $result[] = array($r, $c);
            }
        }

        $currentDirection = ($currentDirection + 1) % 4;
    }

    return $result;
}
}
