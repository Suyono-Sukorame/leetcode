class Solution {

/**
 * @param Integer[] $nums
 * @return Boolean
 */
function splitArraySameAverage($nums) {
    $n = count($nums);
    $sum = array_sum($nums);

    $check = array_fill(0, ($n / 2) + 1, array());
    
    for ($i = 0; $i <= $n / 2; $i++) {
        $check[$i] = array();
    }
    
    for ($i = 0; $i < (1 << ($n / 2)); $i++) {
        $sum1 = 0;
        $count = 0;
        for ($j = 0; $j < $n / 2; $j++) {
            if (($i & (1 << $j)) > 0) {
                $count++;
                $sum1 += $nums[$n / 2 - 1 - $j];
            }
        }
        array_push($check[$count], $sum1);
    }
    
    for ($i = 0; $i < (1 << ($n / 2)); $i++) {
        $sum1 = 0;
        $count = 0;
        for ($j = 0; $j < $n / 2; $j++) {
            if (($i & (1 << $j)) > 0) {
                $count++;
                $sum1 += $nums[$n - 1 - $j];
            }
        }
        for ($j = 0; $j <= $n / 2; $j++) {
            if ($count + $j == 0 || $count + $j == $n) {
                continue;
            }
            $tcount = $j + $count;
            if ((($tcount * $sum - $n * $sum1) % $n) != 0) {
                continue;
            }
            if (in_array(($tcount * $sum - $n * $sum1) / $n, $check[$j])) {
                return true;
            }
        }
    }
    return false;
}
}
