class Solution {

/**
 * @param String[] $words
 * @return String
 */
function firstPalindrome($words) {
    foreach ($words as $word) {
        if ($this->isPalindrome($word)) {
            return $word;
        }
    }
    return "";
}

/**
 * Function to check if a string is palindrome or not.
 * @param String $str
 * @return boolean
 */
function isPalindrome($str) {
    $len = strlen($str);
    for ($i = 0; $i < $len / 2; $i++) {
        if ($str[$i] !== $str[$len - $i - 1]) {
            return false;
        }
    }
    return true;
}
}
