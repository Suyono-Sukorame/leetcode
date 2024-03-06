class Solution {

function minDeletionSize($strs) {
    $length = strlen($strs[0]);
    $dp = array_fill(0, $length, 0);
    
    $max = 0;
    for ($i = 0; $i < $length; $i++) {
        $dp[$i] = 1;
        for ($j = 0; $j < $i; $j++) {
            if ($this->checkLager($j, $i, $strs)) {
                $dp[$i] = max($dp[$i], $dp[$j] + 1);
            }
        }
        $max = max($max, $dp[$i]);
    }
    
    return $length - $max;
}

function checkLager($j, $i, $strs) {
    foreach ($strs as $s) {
        if ($s[$j] > $s[$i]) {
            return false;
        }
    }
    return true;
}
}
