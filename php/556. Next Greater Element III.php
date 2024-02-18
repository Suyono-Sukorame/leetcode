class Solution {

/**
 * @param Integer $n
 * @return Integer
 */
function nextGreaterElement($n) {
    $arr = str_split(strval($n));
    $len = count($arr);
    $max = $arr[$len - 1];
    $index = -1;
    
    for ($i = $len - 2; $i >= 0; $i-- ){
        if ($arr[$i] < $max) {
            $index = $i;
            break;
        }
        $max = $arr[$i];
    }
    
    if ($index === -1) return -1;

    $lastPart = array_splice($arr, $index + 1);
    sort($lastPart);

    foreach ($lastPart as $j => $val) {
        if ($val > $arr[$index]) {
            [$arr[$index], $lastPart[$j]] = [$lastPart[$j], $arr[$index]];
            break;
        }
    }

    $result = intval(implode("", $arr) . implode("", $lastPart));
    
    return $result > (pow(2, 31) - 1) ? -1 : $result;
}
}
