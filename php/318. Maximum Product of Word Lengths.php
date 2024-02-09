class Solution {

/**
 * @param String[] $words
 * @return Integer
 */
function maxProduct($words) {
    $n = count($words);
    $lengths = array_fill(0, $n, 0);

    for ($i = 0; $i < $n; $i++) {
        $word = $words[$i];
        $length = strlen($word);
        $mask = 0;
        for ($j = 0; $j < $length; $j++) {
            $mask |= 1 << (ord($word[$j]) - ord('a'));
        }
        $lengths[$i] = $mask;
    }

    $maxProduct = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if (($lengths[$i] & $lengths[$j]) == 0) {
                $maxProduct = max($maxProduct, strlen($words[$i]) * strlen($words[$j]));
            }
        }
    }

    return $maxProduct;
}
}

$solution = new Solution();
$words1 = ["abcw","baz","foo","bar","xtfn","abcdef"];
echo $solution->maxProduct($words1) . "\n"; // Output: 16

$words2 = ["a","ab","abc","d","cd","bcd","abcd"];
echo $solution->maxProduct($words2) . "\n"; // Output: 4

$words3 = ["a","aa","aaa","aaaa"];
echo $solution->maxProduct($words3) . "\n"; // Output: 0
