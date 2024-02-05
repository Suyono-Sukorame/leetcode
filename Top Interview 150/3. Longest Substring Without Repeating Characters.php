class Solution {

/**
 * @param String $s
 * @return Integer
 */
function lengthOfLongestSubstring($s) {
    $maxLength = 0;
    $start = 0;
    $charIndexMap = [];

    for ($end = 0; $end < strlen($s); $end++) {
        $currentChar = $s[$end];

        if (isset($charIndexMap[$currentChar]) && $charIndexMap[$currentChar] >= $start) {
            $start = $charIndexMap[$currentChar] + 1;
        }

        $charIndexMap[$currentChar] = $end;

        $currentLength = $end - $start + 1;

        $maxLength = max($maxLength, $currentLength);
    }

    return $maxLength;
}
}

$solution = new Solution();
echo $solution->lengthOfLongestSubstring("abcabcbb"); // Output: 3
echo $solution->lengthOfLongestSubstring("bbbbb"); // Output: 1
