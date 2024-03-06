class Solution {

function minDeletionSize($strs) {
    $cnt = 0;
    $compared = array_fill(0, count($strs), false);

    for ($i = 0; $i < strlen($strs[0]); $i++) {
        $currCompared = array_fill(0, count($strs), false);

        for ($j = 0; $j < count($strs) - 1; $j++) {
            if (!$compared[$j]) {
                if ($strs[$j][$i] > $strs[$j + 1][$i]) {
                    $cnt++;
                    break;
                } elseif ($strs[$j][$i] < $strs[$j + 1][$i]) {
                    $currCompared[$j] = true;
                }
            }
        }

        if ($j == count($strs) - 1) {
            for (; $j > 0; $j--) {
                $compared[$j - 1] |= $currCompared[$j - 1];
            }
        }
    }

    return $cnt;
}
}
