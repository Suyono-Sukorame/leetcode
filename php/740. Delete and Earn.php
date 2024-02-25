class Solution {

function deleteAndEarn($nums) {
    sort($nums);
    $arr = array_fill(0, $nums[count($nums) - 1], 0);
    $j = 0;
    $arr[0] = $nums[0];
    
    for ($i = 0; $i < count($nums) - 1; $i++) {
        if ($nums[$i + 1] > $nums[$i] + 1) {
            for ($k = $nums[$i]; $k < $nums[$i + 1] - 1; $k++) {
                $j++;
                $arr[$j] = 0;
            }
        }
        
        if ($nums[$i] == $nums[$i + 1]) {
            $arr[$j] += $nums[$i];
        } else if ($j < count($arr) - 1) {
            $j++;
            $arr[$j] = $nums[$i + 1];
        }
    }
    
    $sum = 0;
    $sum1 = 0;
    
    for ($i = 0; $i < count($arr); $i++) {
        if ($i % 2 == 0) {
            $sum += $arr[$i];
            $sum = max($sum, $sum1);
        } else {
            $sum1 += $arr[$i];
            $sum1 = max($sum, $sum1);
        }
    }
    
    return ($sum1 > $sum) ? $sum1 : $sum;
}
}
