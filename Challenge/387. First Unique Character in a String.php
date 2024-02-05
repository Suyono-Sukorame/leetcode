class Solution {

/**
 * @param String $s
 * @return Integer
 */
function firstUniqChar($s) {
    $charCount = array();

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if (array_key_exists($char, $charCount)) {
            $charCount[$char]++;
        } else {
            $charCount[$char] = 1;
        }
    }

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];
        if ($charCount[$char] == 1) {
            return $i;
        }
    }

    return -1;
}
}

$solution = new Solution();
echo $solution->firstUniqChar("leetcode"); // Output: 0
echo $solution->firstUniqChar("loveleetcode"); // Output: 2
echo $solution->firstUniqChar("aabb"); // Output: -1
