class Solution {

/**
 * @param String $s
 * @return String
 */
function longestDupSubstring($s) {
    $max_len = 0;
    $str_start = 0;
    
    // case of repeated characters
    $str = str_split($s);
    if (count(array_unique($str)) === 1) {
        return substr($s, 1);
    }
    
    $start = 0;
    for ($end = 1; $end < strlen($s); $end++) {
        if ($max_len >= ($end - $start)) {
            break;
        }
        
        $str_temp = substr($s, $start, $end - $start);
        
        if (strpos(substr($s, $start + 1), $str_temp) !== false && strlen($str_temp) > $max_len) {
            $str_start = $start;
            $max_len = strlen($str_temp);
        } else {
            $start += 1;
        }
    }
    
    return substr($s, $str_start, $max_len);
}
}
