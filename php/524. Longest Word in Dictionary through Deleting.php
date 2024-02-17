class Solution {

/**
 * @param String $s
 * @param String[] $dictionary
 * @return String
 */
function findLongestWord($s, $dictionary) {
    $longestWord = '';

    foreach ($dictionary as $word) {
        $len1 = strlen($word);
        $len2 = strlen($longestWord);

        if ($len1 < $len2 || ($len1 == $len2 && strcmp($word, $longestWord) >= 0)) {
            continue;
        }

        if ($this->isSubsequence($word, $s)) {
            $longestWord = $word;
        }
    }

    return $longestWord;
}

private function isSubsequence($word, $s) {
    $i = 0;
    $j = 0;
    $len1 = strlen($word);
    $len2 = strlen($s);

    while ($i < $len1 && $j < $len2) {
        if ($word[$i] == $s[$j]) {
            $i++;
        }
        $j++;
    }

    return $i == $len1;
}
}