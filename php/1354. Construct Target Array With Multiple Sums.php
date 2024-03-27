class Solution {
    /**
     * @param Integer[] $target
     * @return Boolean
     */
    function isPossible($target) {
        $heap = new SplMaxHeap();
        $sum = 0;
        foreach ($target as $num) {
            $heap->insert($num);
            $sum += $num;
        }
        while ($heap->top() > 1) {
            $a = $heap->extract();
            if ($sum - $a == 1) return true;
            if ($a < $sum - $a || $sum - $a == 0) return false;
            $temp = $a % ($sum - $a);
            if ($temp <= 0) return false;
            $sum = -$a + $sum + $temp;
            $heap->insert($temp);
        }
        return true;
    }
}
