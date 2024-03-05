class Solution {
    function threeEqualParts($arr) {
        $countOne = array_count_values($arr)[1];
        $n = count($arr);
        
        if ($countOne % 3 != 0) {
            return [-1, -1];
        }
        
        if ($countOne == 0) {
            return [0, $n - 1];
        }
        
        $total = $countOne / 3;
        $p1 = $p2 = $p3 = 0;
        $count = 0;
        
        for ($i = 0; $i < $n; $i++) {
            if ($arr[$i] == 1) {
                if ($count == 0) {
                    $p1 = $i;
                } elseif ($count == $total) {
                    $p2 = $i;
                } elseif ($count == 2 * $total) {
                    $p3 = $i;
                }
                $count++;
            }
        }
        
        while ($p3 < $n - 1) {
            $p1++;
            $p2++;
            $p3++;
            if ($arr[$p1] != $arr[$p2] || $arr[$p2] != $arr[$p3] || $arr[$p1] != $arr[$p3]) {
                return [-1, -1];
            }
        }
        
        return [$p1, $p2 + 1];
    } 
}