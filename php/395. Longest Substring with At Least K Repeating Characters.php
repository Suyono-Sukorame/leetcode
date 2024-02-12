class Solution {

/**
 * @param String $s
 * @param Integer $k
 * @return Integer
 */
function longestSubstring($s, $k) {
    $n = strlen($s);
    $maxUnique = count(array_unique(str_split($s)));
    
    $maxLength = 0;
    for ($numUnique = 1; $numUnique <= $maxUnique; $numUnique++) {
        $left = 0;
        $right = 0;
        $unique = 0; 
        $kOrMore = 0;
        $charCount = array_fill(0, 26, 0);
        while ($right < $n) {
            if ($unique <= $numUnique) {
                $charIndex = ord($s[$right]) - ord('a');
                if ($charCount[$charIndex] == 0) {
                    $unique++;
                }
                $charCount[$charIndex]++;
                if ($charCount[$charIndex] == $k) {
                    $kOrMore++;
                }
                $right++;
            } else {
                $charIndex = ord($s[$left]) - ord('a');
                if ($charCount[$charIndex] == $k) {
                    $kOrMore--;
                }
                $charCount[$charIndex]--;
                if ($charCount[$charIndex] == 0) {
                    $unique--;
                }
                $left++;
            }
            if ($unique == $numUnique && $unique == $kOrMore) {
                $maxLength = max($maxLength, $right - $left);
            }
        }
    }
    
    return $maxLength;
}
}
