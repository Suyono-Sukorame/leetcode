class Solution {
    /**
     * @param String $input
     * @return Integer
     */
    function lengthLongestPath($input) {
        $maxLen = 0;
        $stack = array(0);
        $directories = explode("\n", $input);
        
        foreach ($directories as $dir) {
            $level = substr_count($dir, "\t");
            $name = substr($dir, $level);
            $isFile = strpos($name, '.') !== false;
            
            while ($level + 1 < count($stack)) {
                array_pop($stack);
            }
            
            $len = $stack[count($stack) - 1] + strlen($name) + ($isFile ? 0 : 1);
            $stack[] = $len;
            
            if ($isFile) {
                $maxLen = max($maxLen, $len);
            }
        }
        
        return $maxLen;
    }
}
