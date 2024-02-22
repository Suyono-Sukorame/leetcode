class Solution {

/**
 * @param String[] $dictionary
 * @param String $sentence
 * @return String
 */
function replaceWords($dictionary, $sentence) {
    $roots = array_flip($dictionary);
    $result = [];
    
    $words = explode(" ", $sentence);
    
    foreach ($words as $word) {
        $prefix = '';
        for ($i = 1; $i <= strlen($word); $i++) {
            $prefix = substr($word, 0, $i);
            if (isset($roots[$prefix])) {
                $result[] = $prefix;
                break;
            }
        }
        if (!isset($roots[$prefix])) {
            $result[] = $word;
        }
    }
    
    return implode(" ", $result);
}
}
