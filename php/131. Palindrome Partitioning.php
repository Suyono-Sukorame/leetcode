class Solution {

/**
 * @param String $s
 * @return String[][]
 */
function partition($s) {
    $result = [];
    $this->dfs($s, 0, [], $result);
    return $result;
}

function dfs($s, $start, $path, &$result) {
    if ($start >= strlen($s)) {
        $result[] = $path;
        return;
    }
    
    for ($i = $start; $i < strlen($s); $i++) {
        $substring = substr($s, $start, $i - $start + 1);
        if ($this->isPalindrome($substring)) {
            $this->dfs($s, $i + 1, array_merge($path, [$substring]), $result);
        }
    }
}

function isPalindrome($s) {
    $left = 0;
    $right = strlen($s) - 1;
    
    while ($left < $right) {
        if ($s[$left] !== $s[$right]) {
            return false;
        }
        $left++;
        $right--;
    }
    
    return true;
}
}
