class Solution {

function isAlienSorted($words, $order) {
    $map = [];
    for ($i = 0; $i < strlen($order); $i++) {
        $map[$order[$i]] = $i;
    }
    
    for ($i = 0; $i < count($words) - 1; $i++) {
        if (!$this->compareWords($words[$i], $words[$i + 1], $map)) {
            return false;
        }
    }
    
    return true;
}

function compareWords($word1, $word2, $map) {
    $len1 = strlen($word1);
    $len2 = strlen($word2);
    $minLen = min($len1, $len2);
    
    for ($i = 0; $i < $minLen; $i++) {
        $char1 = $word1[$i];
        $char2 = $word2[$i];
        
        if ($map[$char1] < $map[$char2]) {
            return true;
        } elseif ($map[$char1] > $map[$char2]) {
            return false;
        }
    }
    
    if ($len1 <= $len2) {
        return true;
    } else {
        return false;
    }
}
}
