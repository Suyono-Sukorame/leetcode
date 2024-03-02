class Solution {

/**
 * @param String[] $words
 * @param String $pattern
 * @return String[]
 */
function findAndReplacePattern($words, $pattern) {
    $result = array();
    
    foreach ($words as $word) {
        if ($this->matchPattern($word, $pattern)) {
            $result[] = $word;
        }
    }
    
    return $result;
}

function matchPattern($word, $pattern) {
    if (strlen($word) != strlen($pattern)) {
        return false;
    }
    
    $wordMap = array();
    $patternMap = array();
    
    for ($i = 0; $i < strlen($word); $i++) {
        $w = $word[$i];
        $p = $pattern[$i];
        
        if (!isset($wordMap[$w])) {
            $wordMap[$w] = $p;
        } elseif ($wordMap[$w] != $p) {
            return false;
        }
        
        if (!isset($patternMap[$p])) {
            $patternMap[$p] = $w;
        } elseif ($patternMap[$p] != $w) {
            return false;
        }
    }
    
    return true;
}
}
