class Solution {

/**
 * @param String[] $wordlist
 * @param String[] $queries
 * @return String[]
 */
function spellchecker($wordlist, $queries) {
    $wordset = array_flip($wordlist);
    $capMap = array();
    $vowelMap = array();
    
    $vowels = array('a', 'e', 'i', 'o', 'u');
    foreach ($wordlist as $word) {
        $wordLower = strtolower($word);
        $capMap[$wordLower] = $capMap[$wordLower] ?? $word;
        
        $wordWithoutVowels = preg_replace('/[aeiou]/i', '*', $wordLower);
        $vowelMap[$wordWithoutVowels] = $vowelMap[$wordWithoutVowels] ?? $word;
    }
    
    $result = array();
    foreach ($queries as $query) {
        if (isset($wordset[$query])) {
            $result[] = $query;
            continue;
        }
        
        $queryLower = strtolower($query);
        if (isset($capMap[$queryLower])) {
            $result[] = $capMap[$queryLower];
            continue;
        }
        
        $queryWithoutVowels = preg_replace('/[aeiou]/i', '*', $queryLower);
        if (isset($vowelMap[$queryWithoutVowels])) {
            $result[] = $vowelMap[$queryWithoutVowels];
            continue;
        }
        
        $result[] = '';
    }
    
    return $result;
}
}