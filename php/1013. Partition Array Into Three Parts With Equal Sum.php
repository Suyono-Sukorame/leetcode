class Solution {
    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function canThreePartsEqualSum($arr) {
        $total = array_sum($arr);
        if ($total % 3 != 0) {
            return false;
        }

        $partSum = $total / 3;
        $sum = 0;
        $count = 0;

        foreach ($arr as $num) {
            $sum += $num;
            if ($sum == $partSum) {
                $count++;
                $sum = 0;
            }
        }

        return $count >= 3;
    }
}
