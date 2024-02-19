class Solution {
    /**
     * @param String $expression
     * @return Integer
     */
    function evaluate($expression) {
        return $this->helper($expression);
    }
    
    function helper($expr, $map = []) {
        if ($expr[0] !== '(')
            return preg_match('/[0-9]|-/', $expr[0]) ? intval($expr) : $map[$expr];
        
        $map = $map;
        $start = $expr[1] === 'm' ? 6 : 5;
        $tokens = $this->parse(substr($expr, $start, -1));
        
        if (strpos($expr, '(m') === 0) return $this->helper($tokens[0], $map) * $this->helper($tokens[1], $map);
        if (strpos($expr, '(a') === 0) return $this->helper($tokens[0], $map) + $this->helper($tokens[1], $map);
        
        for ($i = 0; $i < count($tokens) - 2; $i += 2)
            $map[$tokens[$i]] = $this->helper($tokens[$i + 1], $map);
        
        return $this->helper(end($tokens), $map);
    }

    function parse($expr) {
        $tokens = [];
        $builder = '';
        $par = 0;
        
        for ($i = 0; $i < strlen($expr); $i++) {
            $ch = $expr[$i];
            if ($ch === '(') $par++;
            if ($ch === ')') $par--;
            if ($par === 0 && $ch === ' ') {
                $tokens[] = $builder;
                $builder = '';
            } else {
                $builder .= $ch;
            }
        }
        
        if ($builder !== '') {
            $tokens[] = $builder;
        }
        
        return $tokens;
    }
}
