class Solution {

/**
 * @param String[] $words
 * @return Integer
 */
function uniqueMorseRepresentations($words) {
    $morseCodes = [".-","-...","-.-.","-..",".","..-.","--.","....","..",".---","-.-",".-..","--","-.","---",".--.","--.-",".-.","...","-","..-","...-",".--","-..-","-.--","--.."];
    
    $transformations = [];
    foreach ($words as $word) {
        $transformation = '';
        for ($i = 0; $i < strlen($word); $i++) {
            $index = ord($word[$i]) - ord('a');
            $transformation .= $morseCodes[$index];
        }
        $transformations[] = $transformation;
    }
    
    return count(array_unique($transformations));
}
}
