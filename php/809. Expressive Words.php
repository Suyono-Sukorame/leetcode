class Solution {

/**
 * @param String $s
 * @param String[] $words
 * @return Integer
 */
function expressiveWords($s, $words) {
    $count = 0;
    foreach ($words as $word) {
        if ($this->isStretchy($s, $word)) {
            $count++;
        }
    }
    return $count;
}

function isStretchy($s, $word) {
    $i = $j = 0;
    $m = strlen($s);
    $n = strlen($word);
    
    while ($i < $m && $j < $n) {
        if ($s[$i] != $word[$j]) {
            return false;
        }
        
        $len1 = $len2 = 0;
        while ($i < $m && $s[$i] == $word[$j]) {
            $i++;
            $len1++;
        }
        while ($j < $n && $word[$j] == $s[$i - 1]) {
            $j++;
            $len2++;
        }
        
        if ($len1 < 3 && $len1 != $len2 || $len1 >= 3 && $len1 < $len2) {
            return false;
        }
    }
    
    return $i == $m && $j == $n;
}
}