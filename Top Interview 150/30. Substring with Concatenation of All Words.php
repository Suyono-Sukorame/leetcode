class Solution {

/**
 * @param String $s
 * @param String[] $words
 * @return Integer[]
 */
function findSubstring($s, $words) {
    $result = [];
    $wordLength = strlen($words[0]);
    $totalLength = count($words) * $wordLength;

    $wordCountMap = [];

    foreach ($words as $word) {
        if (!isset($wordCountMap[$word])) {
            $wordCountMap[$word] = 1;
        } else {
            $wordCountMap[$word]++;
        }
    }

    for ($i = 0; $i <= strlen($s) - $totalLength; $i++) {
        $substring = substr($s, $i, $totalLength);
        $wordMap = [];

        for ($j = 0; $j < $totalLength; $j += $wordLength) {
            $currentWord = substr($substring, $j, $wordLength);

            if (!isset($wordCountMap[$currentWord])) {
                break;
            }

            if (!isset($wordMap[$currentWord])) {
                $wordMap[$currentWord] = 1;
            } else {
                $wordMap[$currentWord]++;
            }

            if ($wordMap[$currentWord] > $wordCountMap[$currentWord]) {
                break;
            }

            if ($j === $totalLength - $wordLength) {
                $result[] = $i;
            }
        }
    }

    return $result;
}
}

// Example usage:
$solution = new Solution();
print_r($solution->findSubstring("barfoothefoobarman", ["foo","bar"])); // Output: [0,9]
