class Solution {

/**
 * @param String $s
 * @param String $t
 * @return String
 */
function minWindow($s, $t) {
    $charCount = [];
    $requiredChars = strlen($t);
    $minLen = PHP_INT_MAX;
    $minWindowStart = 0;
    $left = 0;
    $right = 0;

    for ($i = 0; $i < strlen($t); $i++) {
        $char = $t[$i];
        $charCount[$char] = ($charCount[$char] ?? 0) + 1;
    }

    while ($right < strlen($s)) {
        $charRight = $s[$right];

        if (isset($charCount[$charRight])) {
            $charCount[$charRight]--;

            if ($charCount[$charRight] >= 0) {
                $requiredChars--;
            }
        }

        while ($requiredChars === 0) {
            if ($right - $left < $minLen) {
                $minLen = $right - $left;
                $minWindowStart = $left;
            }

            $charLeft = $s[$left];

            if (isset($charCount[$charLeft])) {
                $charCount[$charLeft]++;

                if ($charCount[$charLeft] > 0) {
                    $requiredChars++;
                }
            }

            $left++;
        }

        $right++;
    }

    return $minLen === PHP_INT_MAX ? "" : substr($s, $minWindowStart, $minLen + 1);
}
}

// Example usage:
$solution = new Solution();
echo $solution->minWindow("ADOBECODEBANC", "ABC"); // Output: "BANC"
echo $solution->minWindow("a", "a"); // Output: "a"
echo $solution->minWindow("a", "aa"); // Output: ""
