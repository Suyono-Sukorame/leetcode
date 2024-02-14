class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function magicalString($n) {
    $arr = ['1', '2', '2'];
    $i = 0;
    $res = 1;
    while (count($arr) < $n) {
        $val = $i % 2 === 0 ? '1' : '2';
        $isOne = $val === '1';
        if (isset($arr[$i + 2]) && $arr[$i + 2] === '1') {
            $arr[] = $val;
            if ($isOne) $res++;
        } else {
            $arr[] = $val;
            if ($isOne) $res++;
            if (count($arr) >= $n) break;
            $arr[] = $val;
            if ($isOne) $res++;
        }
        $i++;
    }
    return $res;
}
}
