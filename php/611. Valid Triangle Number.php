class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function triangleNumber($nums) {
    sort($nums);

    $count = 0;
    $n = count($nums);

    for ($i = 0; $i < $n - 2; $i++) {
        $k = $i + 2;
        for ($j = $i + 1; $j < $n - 1 && $nums[$i] != 0; $j++) {
            while ($k < $n && $nums[$i] + $nums[$j] > $nums[$k]) {
                $k++;
            }
            $count += max(0, $k - $j - 1);
        }
    }

    return $count;
}
}
