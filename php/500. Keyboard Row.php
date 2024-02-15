class Solution {

/**
 * @param String[] $words
 * @return String[]
 */
function findWords($words) {
    $rows = [
        'qwertyuiop',
        'asdfghjkl',
        'zxcvbnm'
    ];
    
    $result = [];
    foreach ($words as $word) {
        $lowerWord = strtolower($word);
        $inRow = true;
        $rowIndex = -1;
        foreach ($rows as $i => $row) {
            if (strpos($row, $lowerWord[0]) !== false) {
                $rowIndex = $i;
                break;
            }
        }
        for ($i = 1; $i < strlen($lowerWord); $i++) {
            if (strpos($rows[$rowIndex], $lowerWord[$i]) === false) {
                $inRow = false;
                break;
            }
        }
        if ($inRow) {
            $result[] = $word;
        }
    }
    
    return $result;
}
}
