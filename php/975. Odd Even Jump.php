class Solution {

/**
 * @param Integer[] $arr
 * @return Integer
 */
function oddEvenJumps($arr) {
    $count = array_fill(0, 100001, 0);
    $res = [];
    $res[0] = array_fill(0, count($arr), false);
    $res[1] = array_fill(0, count($arr), false);
    $res[0][count($arr) - 1] = true;
    $res[1][count($arr) - 1] = true;
    $count[$arr[count($arr) - 1]] = count($arr);
    $min = $arr[count($arr) - 1];
    $max = $arr[count($arr) - 1];
    $result = 1;

    for ($i = count($arr) - 2; $i >= 0; $i--) {
        $nextSmallIndex = $this->findNextSmall($count, $min, $max, $arr[$i]);
        $nextLargeIndex = $this->findNextLarge($count, $min, $max, $arr[$i]);

        if ($nextSmallIndex == -1) {
            $res[0][$i] = false;
        } else {
            $res[0][$i] = $res[1][$nextSmallIndex];
        }

        if ($nextLargeIndex == -1) {
            $res[1][$i] = false;
        } else {
            $res[1][$i] = $res[0][$nextLargeIndex];
        }

        $count[$arr[$i]] = $i + 1;
        $min = min($min, $arr[$i]);
        $max = max($max, $arr[$i]);

        if ($res[0][$i]) {
            $result++;
        }
    }

    return $result;
}

function findNextSmall($count, $min, $max, $val) {
    for ($i = $val; $i <= $max; $i++) {
        if ($count[$i] !== 0) {
            return $count[$i] - 1;
        }
    }
    return -1;
}

function findNextLarge($count, $min, $max, $val) {
    for ($i = $val; $i >= $min; $i--) {
        if ($count[$i] !== 0) {
            return $count[$i] - 1;
        }
    }
    return -1;
}
}
