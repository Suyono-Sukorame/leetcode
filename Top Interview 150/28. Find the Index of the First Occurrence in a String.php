class Solution {

function strStr($haystack, $needle) {
    $index = strpos($haystack, $needle);
    return ($index !== false) ? $index : -1;
}
}

$solution = new Solution();
echo $solution->strStr("sadbutsad", "sad"); // Output: 0
echo $solution->strStr("leetcode", "leeto"); // Output: -1
