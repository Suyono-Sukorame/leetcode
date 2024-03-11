class Solution {

function customSortString($order, $s) {
    $count = array_fill(0, 26, 0);
    $result = '';
    
    for ($i = 0; $i < strlen($s); $i++) {
        $count[ord($s[$i]) - ord('a')]++;
    }
    
    for ($i = 0; $i < strlen($order); $i++) {
        $char = $order[$i];
        while ($count[ord($char) - ord('a')] > 0) {
            $result .= $char;
            $count[ord($char) - ord('a')]--;
        }
    }
    
    for ($i = 0; $i < 26; $i++) {
        $char = chr($i + ord('a'));
        while ($count[$i] > 0) {
            $result .= $char;
            $count[$i]--;
        }
    }
    
    return $result;
}
}