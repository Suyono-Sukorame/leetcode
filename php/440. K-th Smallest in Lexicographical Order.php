class Solution {
    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function findKthNumber($n, $k) {
        $cur = 1;
        $k--;
        while ($k > 0) {
            $steps = $this->calcSteps($n, $cur, $cur + 1);
            if ($steps <= $k) {
                $cur++;
                $k -= $steps;
            } else {
                $cur *= 10;
                $k--;
            }
        }
        return $cur;
    }
    
    function calcSteps($n, $n1, $n2) {
        $steps = 0;
        while ($n1 <= $n) {
            $steps += min($n + 1, $n2) - $n1;
            $n1 *= 10;
            $n2 *= 10;
        }
        return $steps;
    }
}

$obj = new Solution();
$n = 13;
$k = 2;
echo $obj->findKthNumber($n, $k); // Output: 10
