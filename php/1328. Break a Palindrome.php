class Solution {
    /**
     * @param String $palindrome
     * @return String
     */
    function breakPalindrome($palindrome) {
        if (strlen($palindrome) == 1) {
            return '';
        }
        
        for ($i = 0; $i < intval(strlen($palindrome) / 2); $i++) {
            if ($palindrome[$i] != 'a') {
                $palindrome = substr_replace($palindrome, 'a', $i, 1);
                return $palindrome;
            }
        }
        
        return substr($palindrome, 0, -1) . 'b';
    }
}
