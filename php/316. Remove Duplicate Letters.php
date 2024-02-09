class Solution {

/**
 * @param String $s
 * @return String
 */
function removeDuplicateLetters($s) {
    $lastIndex = array_fill(0, 26, -1);
    $stack = [];
    $visited = array_fill(0, 26, false);
    
    $n = strlen($s);
    for ($i = 0; $i < $n; $i++) {
        $lastIndex[ord($s[$i]) - ord('a')] = $i;
    }
    
    for ($i = 0; $i < $n; $i++) {
        $ch = $s[$i];
        if ($visited[ord($ch) - ord('a')]) continue;
        
        while (!empty($stack) && $ch < end($stack) && $lastIndex[ord(end($stack)) - ord('a')] > $i) {
            $visited[ord(array_pop($stack)) - ord('a')] = false;
        }
        
        $stack[] = $ch;
        $visited[ord($ch) - ord('a')] = true;
    }
    
    return implode('', $stack);
}
}
