class Solution {
    /**
     * @param String[] $source
     * @return String[]
     */
    function removeComments($source) {
        $result = [];
        $inBlockComment = false;
        $newLine = "";
        
        foreach ($source as $line) {
            if (!$inBlockComment) {
                $newLine = "";
            }
            
            $i = 0;
            $lineLength = strlen($line);
            while ($i < $lineLength) {
                if (!$inBlockComment && $i + 1 < $lineLength && $line[$i] == '/' && $line[$i + 1] == '/') {
                    break;
                } elseif (!$inBlockComment && $i + 1 < $lineLength && $line[$i] == '/' && $line[$i + 1] == '*') {
                    $inBlockComment = true;
                    $i++;
                } elseif ($inBlockComment && $i + 1 < $lineLength && $line[$i] == '*' && $line[$i + 1] == '/') {
                    $inBlockComment = false;
                    $i++;
                } elseif (!$inBlockComment) {
                    $newLine .= $line[$i];
                }
                
                $i++;
            }
            
            if (!$inBlockComment && !empty($newLine)) {
                $result[] = $newLine;
            }
        }
        
        return $result;
    }
}
