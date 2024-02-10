class Solution {

/**
 * @param String[] $words
 * @return Integer[][]
 */
function palindromePairs($words) {
    $res = [];
    if (empty($words)) {
        return $res;
    }
    
    $map = [];
    foreach ($words as $idx => $word) {
        $map[$word] = $idx;
    }
    
    if (array_key_exists("", $map)) {
        $blankIdx = $map[""];
        foreach ($words as $i => $word) {
            if ($this->isPalindrome($word)) {
                if ($i == $blankIdx) continue;
                $res[] = [$blankIdx, $i];
                $res[] = [$i, $blankIdx];
            }
        }
    }
    
    foreach ($words as $i => $word) {
        $cur_r = strrev($word);
        if (array_key_exists($cur_r, $map)) {
            $found = $map[$cur_r];
            if ($found == $i) continue;
            $res[] = [$i, $found];
        }
    }
    
    foreach ($words as $i => $cur) {
        for ($cut = 1; $cut < strlen($cur); $cut++) {
            if ($this->isPalindrome(substr($cur, 0, $cut))) {
                $cut_r = strrev(substr($cur, $cut));
                if (array_key_exists($cut_r, $map)) {
                    $found = $map[$cut_r];
                    if ($found == $i) continue;
                    $res[] = [$found, $i];
                }
            }
            if ($this->isPalindrome(substr($cur, $cut))) {
                $cut_r = strrev(substr($cur, 0, $cut));
                if (array_key_exists($cut_r, $map)) {
                    $found = $map[$cut_r];
                    if ($found == $i) continue;
                    $res[] = [$i, $found];
                }
            }
        }
    }
    
    return $res;
}

function isPalindrome($s) {
    $i = 0;
    $j = strlen($s) - 1;
    while ($i <= $j) {
        if ($s[$i] != $s[$j]) {
            return false;
        }
        $i++;
        $j--;
    }
    return true;
}
}

$solution = new Solution();
$words = ["a",""];
print_r($solution->palindromePairs($words)); // Output: [[0,1],[1,0]]
