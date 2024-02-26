class Solution {

/**
 * @param String $s
 * @return String
 */
function makeLargestSpecial($s) {
    return $this->makeLargestSpecialRecursive($s);
}

function makeLargestSpecialRecursive($s) {
    $count = 0;
    $i = 0;
    $result = [];
    
    for ($j = 0; $j < strlen($s); $j++) {
        if ($s[$j] == '1') {
            $count++;
        } else {
            $count--;
        }
        
        if ($count == 0) {
            $result[] = '1' . $this->makeLargestSpecial(substr($s, $i + 1, $j - $i - 1)) . '0';
            $i = $j + 1;
        }
    }
    
    usort($result, function($a, $b) {
        return strcmp($b, $a);
    });
    
    return implode("", $result);
}
}
