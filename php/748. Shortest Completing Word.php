class Solution {

/**
 * @param String $licensePlate
 * @param String[] $words
 * @return String
 */
function shortestCompletingWord($licensePlate, $words) {
    // Menghitung frekuensi kemunculan setiap huruf dalam licensePlate
    $licensePlate = preg_replace('/[^a-zA-Z]/', '', strtolower($licensePlate));
    $licensePlateFreq = array_count_values(str_split($licensePlate));
    
    $shortestWord = null;
    $shortestLength = PHP_INT_MAX;
    
    foreach ($words as $word) {
        $wordFreq = array_count_values(str_split(strtolower($word)));
        
        $isValid = true;
        foreach ($licensePlateFreq as $char => $count) {
            if (!isset($wordFreq[$char]) || $wordFreq[$char] < $count) {
                $isValid = false;
                break;
            }
        }
        
        if ($isValid && strlen($word) < $shortestLength) {
            $shortestWord = $word;
            $shortestLength = strlen($word);
        }
    }
    
    return $shortestWord;
}
}
