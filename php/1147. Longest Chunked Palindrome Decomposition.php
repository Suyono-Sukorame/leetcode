class Solution {

/**
 * @param String $text
 * @return Integer
 */
function longestDecomposition($text) {
    $n = strlen($text);
    $result = 0;
    $prefix = "";
    $suffix = "";
    
    for ($i = 0; $i < $n; $i++) {
        $prefix .= $text[$i];
        $suffix = $text[$n - $i - 1] . $suffix;
        
        if ($prefix == $suffix) {
            $result++;
            $prefix = "";
            $suffix = "";
        }
    }
    
    return $result;
}
}
