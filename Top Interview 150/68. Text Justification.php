class Solution {

/**
 * @param String[] $words
 * @param Integer $maxWidth
 * @return String[]
 */
function fullJustify($words, $maxWidth) {
    $result = [];
    $currentLine = [];
    $currentWidth = 0;

    foreach ($words as $word) {
        $wordLength = strlen($word);

        if ($currentWidth + count($currentLine) + $wordLength <= $maxWidth) {
            $currentLine[] = $word;
            $currentWidth += $wordLength;
        } else {
            $result[] = $this->justifyLine($currentLine, $currentWidth, $maxWidth);
            $currentLine = [$word];
            $currentWidth = $wordLength;
        }
    }

    $result[] = implode(" ", $currentLine) . str_repeat(" ", $maxWidth - $currentWidth - count($currentLine) + 1);

    return $result;
}

private function justifyLine($line, $currentWidth, $maxWidth) {
    $spacesCount = count($line) - 1;
    $extraSpaces = $maxWidth - $currentWidth;

    if ($spacesCount == 0) {
        return $line[0] . str_repeat(" ", $extraSpaces);
    }

    $baseSpaces = floor($extraSpaces / $spacesCount);
    $additionalSpaces = $extraSpaces % $spacesCount;

    $result = $line[0];
    for ($i = 1; $i < count($line); $i++) {
        $result .= str_repeat(" ", $baseSpaces + (($i <= $additionalSpaces) ? 1 : 0)) . $line[$i];
    }

    return $result;
}
}

$solution = new Solution();
$words1 = ["This", "is", "an", "example", "of", "text", "justification."];
$maxWidth1 = 16;
print_r($solution->fullJustify($words1, $maxWidth1));

$words2 = ["What","must","be","acknowledgment","shall","be"];
$maxWidth2 = 16;
print_r($solution->fullJustify($words2, $maxWidth2));

$words3 = ["Science","is","what","we","understand","well","enough","to","explain","to","a","computer.","Art","is","everything","else","we","do"];
$maxWidth3 = 20;
print_r($solution->fullJustify($words3, $maxWidth3));
