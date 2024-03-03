class Solution {
    function totalFruit($arr) {
        $n = count($arr);
        $res = 0;
        $map = [];
        $i = 0;
        $j = 0;
        
        while ($j < $n) {
            $map[$arr[$j]] = isset($map[$arr[$j]]) ? $map[$arr[$j]] + 1 : 1;
            
            while (count($map) > 2) {
                $map[$arr[$i]]--;
                if ($map[$arr[$i]] === 0) {
                    unset($map[$arr[$i]]);
                }
                $i++;
            }
            
            $res = max($res, $j - $i + 1);
            $j++;
        }
        
        return $res;
    }
}
