class Solution {

/**
 * @param Integer[] $arr
 * @param Integer[][] $queries
 * @return Integer[]
 */
function xorQueries($arr, $queries) {
    $result = [];
    $prefixXor = [0];
    $xor = 0;

    foreach ($arr as $num) {
        $xor ^= $num;
        $prefixXor[] = $xor;
    }

    foreach ($queries as $query) {
        $left = $query[0];
        $right = $query[1];
        $result[] = $prefixXor[$right + 1] ^ $prefixXor[$left];
    }

    return $result;
}
}
