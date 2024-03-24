class Solution {

function removePalindromeSub($s) {
    if (empty($s)) {
        return 0;
    }
    
    if ($this->isPalindrome($s)) {
        return 1;
    }
    
    return 2;
}

function isPalindrome($s) {
    return $s === strrev($s);
}
}
