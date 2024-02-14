class Solution {

/**
 * @param String $s
 * @param String $p
 * @return Integer[]
 */
function findAnagrams($s, $p) {
    $result = [];
    $sLen = strlen($s);
    $pLen = strlen($p);
    if ($sLen < $pLen) return $result;
    
    $pCount = array_fill(0, 26, 0);
    $sCount = array_fill(0, 26, 0);
    
    for ($i = 0; $i < $pLen; $i++) {
        $pCount[ord($p[$i]) - ord('a')]++;
    }
    
    for ($i = 0; $i < $pLen; $i++) {
        $sCount[ord($s[$i]) - ord('a')]++;
    }
    
    for ($i = $pLen; $i < $sLen; $i++) {
        if ($this->arraysEqual($pCount, $sCount)) {
            $result[] = $i - $pLen;
        }
        $sCount[ord($s[$i]) - ord('a')]++;
        $sCount[ord($s[$i - $pLen]) - ord('a')]--;
    }
    
    if ($this->arraysEqual($pCount, $sCount)) {
        $result[] = $sLen - $pLen;
    }
    
    return $result;
}

function arraysEqual($arr1, $arr2) {
    for ($i = 0; $i < 26; $i++) {
        if ($arr1[$i] != $arr2[$i]) {
            return false;
        }
    }
    return true;
}
}
