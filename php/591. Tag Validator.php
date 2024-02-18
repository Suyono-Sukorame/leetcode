class Solution {

/**
 * @param String $code
 * @return Boolean
 */
function isValid($code) {
    $stack = [];
    $i = 0;
    
    while ($i < strlen($code)) {
        if ($i > 0 && empty($stack)) return false;
        if (substr($code, $i, 9) == "<![CDATA[") {
            $i += 9;
            $endIndex = strpos($code, "]]>", $i);
            if ($endIndex === false) return false;
            $i = $endIndex + 3;
        } elseif (substr($code, $i, 2) == "</") {
            $i += 2;
            $endIndex = strpos($code, ">", $i);
            if ($endIndex === false) return false;
            $tagName = substr($code, $i, $endIndex - $i);
            if (empty($stack) || array_pop($stack) != $tagName) return false;
            $i = $endIndex + 1;
        } elseif (substr($code, $i, 1) == "<") {
            $i += 1;
            $endIndex = strpos($code, ">", $i);
            if ($endIndex === false || $endIndex - $i < 1 || $endIndex - $i > 9) return false;
            $tagName = substr($code, $i, $endIndex - $i);
            for ($j = $i; $j < $endIndex; $j++) {
                if ($code[$j] < 'A' || $code[$j] > 'Z') return false;
            }
            $stack[] = $tagName;
            $i = $endIndex + 1;
        } else {
            $i++;
        }
    }
    
    return empty($stack);
}
}
