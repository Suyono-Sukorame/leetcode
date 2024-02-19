class Solution {
    /**
     * @param Integer[][] $nums
     * @return Integer[]
     */
    function smallestRange($nums) {
        $arr = [];
        $tags = [];
        foreach ($nums as $index => $numArray) {
            foreach ($numArray as $num) {
                $arr[] = [$num, $index];
            }
        }
        usort($arr, function($a, $b) {
            return $a[0] - $b[0];
        });
        $n = count($nums);
        $l = 0;
        $ans = [];
        $res = PHP_INT_MAX;
        foreach ($arr as $i => $item) {
            [$val, $tag] = $item;
            if (!isset($tags[$tag])) {
                $tags[$tag] = 1;
            } else {
                $tags[$tag]++;
            }
            while (count($tags) == $n) {
                if ($arr[$i][0] - $arr[$l][0] < $res) {
                    $res = $arr[$i][0] - $arr[$l][0];
                    $ans = [$arr[$l][0], $arr[$i][0]];
                }
                [$v, $t] = $arr[$l];
                $tags[$t]--;
                if ($tags[$t] == 0) {
                    unset($tags[$t]);
                }
                $l++;
            }
        }
        return $ans;
    }
}
