class Solution {

function longestCommonPrefix($strs) {
    if (empty($strs)) {
        return "";
    }

    $prefix = $strs[0];

    foreach ($strs as $str) {
        while (strpos($str, $prefix) !== 0) {
            $prefix = substr($prefix, 0, strlen($prefix) - 1);
            if ($prefix === "") {
                return "";
            }
        }
    }

    return $prefix;
}
}

$solution = new Solution();
echo $solution->longestCommonPrefix(["flower","flow","flight"]); // Output: "fl"
echo $solution->longestCommonPrefix(["dog","racecar","car"]); // Output: ""
