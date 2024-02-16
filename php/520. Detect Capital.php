class Solution {
    /**
     * @param String $word
     * @return Boolean
     */
    function detectCapitalUse($word) {
        $n = strlen($word);
        $countUpper = 0;

        for ($i = 0; $i < $n; $i++) {
            if (ctype_upper($word[$i])) {
                $countUpper++;
            }
        }

        return $countUpper === $n || $countUpper === 0 || ($countUpper === 1 && ctype_upper($word[0]));
    }
}
