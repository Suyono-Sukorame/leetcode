class Solution {
    /**
     * @param String $s
     * @return String
     */
    function lastNonEmptyString($s) {
        $charIndexesMap = [];
        
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (!isset($charIndexesMap[$char])) {
                $charIndexesMap[$char] = [];
            }
            array_push($charIndexesMap[$char], $i);
        }
        
        $max = 0;
        $maxChars = [];
        
        foreach ($charIndexesMap as $char => $indexes) {
            $length = count($indexes);
            if ($length > $max) {
                $max = $length;
                $maxChars = [$char];
            } elseif ($length === $max) {
                $maxChars[] = $char;
            }
        }
        
        $lastRemovedChars = [];
        
        foreach ($maxChars as $char) {
            $indexes = $charIndexesMap[$char];
            $lastIndex = end($indexes);
            $lastRemovedChars[] = [
                'char' => $char,
                'index' => $lastIndex
            ];
        }
        
        usort($lastRemovedChars, function($a, $b) {
            return $a['index'] - $b['index'];
        });
        
        $result = '';
        foreach ($lastRemovedChars as $item) {
            $result .= $item['char'];
        }
        
        return $result;
    }
}