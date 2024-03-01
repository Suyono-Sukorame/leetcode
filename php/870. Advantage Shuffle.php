class Solution {

function advantageCount($nums1, $nums2) {
    $v = [];
    foreach ($nums2 as $index => $value) {
        $v[] = [$value, $index];
    }
    sort($nums1);
    usort($v, function($a, $b) {
        return $a[0] - $b[0];
    });
    $n = count($v);
    $res = array_fill(0, $n, -1);
    $j = 0;
    for ($i = 0; $i < $n; $i++) {
        if ($v[$j][0] < $nums1[$i]) {
            $res[$v[$j][1]] = $nums1[$i];
            $nums1[$i] = -1;
            $j++;
        }
    }
    $j = 0;
    for ($i = 0; $i < $n; $i++) {
        if ($nums1[$i] != -1) {
            while ($res[$j] != -1) {
                $j++;
            }
            $res[$j] = $nums1[$i];
        }
    }
    return $res;
}
}
