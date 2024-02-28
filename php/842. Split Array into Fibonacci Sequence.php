class Solution {
    /**
     * @param String $s
     * @return Integer[]
     */
    function splitIntoFibonacci($s) {
        $n = strlen($s);
        return $this->dfs(0, $s, $n, []);
    }
    
    function dfs($cur_index, $string, $n, $cur_seq) {
        if ($cur_index === $n) {
            if (count($cur_seq) >= 3) {
                return $cur_seq;
            } else {
                return [];
            }
        }
        
        $max_len = 10;
        if (count($cur_seq) <= 1) {
            if ($string[$cur_index] === '0') {
                $max_len = 1;
            }
            
            for ($i = $cur_index; $i < min($cur_index + $max_len, $n); $i++) {
                $new_num = (int)substr($string, $cur_index, $i - $cur_index + 1);
                $cur_seq[] = $new_num;
                $res = $this->dfs($i + 1, $string, $n, $cur_seq);
                if ($res) {
                    return $res;
                }
                array_pop($cur_seq);
            }
        } else { // count($cur_seq) >= 2
            $num1 = $cur_seq[count($cur_seq) - 2];
            $num2 = $cur_seq[count($cur_seq) - 1];
            if ($string[$cur_index] === '0') {
                if ($num1 == 0 && $num2 == 0) {
                    $max_len = 1;
                } else {
                    return [];
                }
            }
            
            for ($i = $cur_index; $i < min($cur_index + $max_len, $n); $i++) {
                $new_num = (int)substr($string, $cur_index, $i - $cur_index + 1);
                if ($new_num <= 2147483647 && $new_num == $num1 + $num2) {
                    $cur_seq[] = $new_num;
                    $res = $this->dfs($i + 1, $string, $n, $cur_seq);
                    if ($res) {
                        return $res;
                    }
                    array_pop($cur_seq);
                }
            }
        }
        
        return [];
    }
}