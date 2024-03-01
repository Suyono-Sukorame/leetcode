class Solution {

/**
 * @param Integer[] $arr
 * @return Integer
 */
function lenLongestFibSubseq($arr) {
    $n = count($arr);
    $maxLen = 0;
    $set = array_flip($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            $a = $arr[$i];
            $b = $arr[$j];
            $len = 2;

            while (isset($set[$a + $b])) {
                $c = $a + $b;
                $a = $b;
                $b = $c;
                $len++;
            }

            $maxLen = max($maxLen, $len);
        }
    }

    return $maxLen > 2 ? $maxLen : 0;
}
}
