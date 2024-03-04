class Solution {
    function minAddToMakeValid($s) {
        $stack = [];
        $count = 0;
        
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '(') {
                array_push($stack, $s[$i]);
            } elseif ($s[$i] == ')') {
                if (!empty($stack)) {
                    array_pop($stack);
                } else {
                    $count++;
                }
            }
        }
        
        $count += count($stack);
        return $count;
    }
}
