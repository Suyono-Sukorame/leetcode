class Solution {

function lengthOfLastWord($s) {
    $words = explode(" ", trim($s));
    return strlen(end($words));
}
}

$solution = new Solution();
echo $solution->lengthOfLastWord("Hello World"); // Output: 5
echo $solution->lengthOfLastWord("   fly me   to   the moon  "); // Output: 4
echo $solution->lengthOfLastWord("luffy is still joyboy"); // Output: 6
