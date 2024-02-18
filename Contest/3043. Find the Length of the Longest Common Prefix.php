class Solution {

/**
 * @param Integer[] $arr1
 * @param Integer[] $arr2
 * @return Integer
 */
function longestCommonPrefix($arr1, $arr2) {
    $ans = 0;
    $mp = [];
    
    foreach ($arr1 as $num1) {
        $b = (string)$num1;
        $a = "";
        for ($j = 0; $j < strlen($b); $j++) {
            $a .= $b[$j];
            $mp[$a] = true;
        }
    }
 
    foreach ($arr2 as $num2) {
        $b = (string)$num2;
        $a = "";
        for ($j = 0; $j < strlen($b); $j++) {
            $a .= $b[$j];
            if (array_key_exists($a, $mp)) {
                $ab = strlen($a);
                $ans = max($ans, $ab);
            } else {
                break;
            }
        }
    }
    
    return $ans;
}
}
