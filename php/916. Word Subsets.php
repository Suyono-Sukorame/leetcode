class Solution {

/**
 * @param String[] $words1
 * @param String[] $words2
 * @return String[]
 */
function wordSubsets($words1, $words2) {
    $count = [];
    foreach ($words2 as $word) {
        $wordCount = $this->countCharacters($word);
        foreach ($wordCount as $char => $freq) {
            $count[$char] = max($count[$char] ?? 0, $freq);
        }
    }
    
    $result = [];
    foreach ($words1 as $word) {
        $wordCount = $this->countCharacters($word);
        $universal = true;
        foreach ($count as $char => $freq) {
            if (!isset($wordCount[$char]) || $wordCount[$char] < $freq) {
                $universal = false;
                break;
            }
        }
        if ($universal) {
            $result[] = $word;
        }
    }
    
    return $result;
}

function countCharacters($word) {
    $count = [];
    $length = strlen($word);
    for ($i = 0; $i < $length; $i++) {
        $char = $word[$i];
        $count[$char] = ($count[$char] ?? 0) + 1;
    }
    return $count;
}
}
