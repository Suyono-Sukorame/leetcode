class Solution {

function commonChars($words) {
    $result = [];
    
    $charCount = [];
    foreach (str_split($words[0]) as $char) {
        $charCount[$char] = isset($charCount[$char]) ? $charCount[$char] + 1 : 1;
    }
    
    for ($i = 1; $i < count($words); $i++) {
        $currentCharCount = [];
        foreach (str_split($words[$i]) as $char) {
            if (isset($charCount[$char]) && $charCount[$char] > 0) {
                $currentCharCount[$char] = isset($currentCharCount[$char]) ? $currentCharCount[$char] + 1 : 1;
                $charCount[$char]--;
            }
        }
        $charCount = $currentCharCount;
    }
    
    foreach ($charCount as $char => $count) {
        for ($i = 0; $i < $count; $i++) {
            $result[] = $char;
        }
    }
    
    return $result;
}
}
