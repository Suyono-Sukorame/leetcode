class Solution {

function largestTimeFromDigits($arr) {
    $maxTime = "";
    
    $permutations = $this->permute($arr);
    
    foreach ($permutations as $perm) {
        $hour = $perm[0] * 10 + $perm[1];
        $minute = $perm[2] * 10 + $perm[3];
        
        if ($hour < 24 && $minute < 60) {
            $time = sprintf("%02d:%02d", $hour, $minute);
            $maxTime = max($maxTime, $time);
        }
    }
    
    return $maxTime;
}

function permute($arr) {
    $n = count($arr);
    $result = [];
    $this->permuteHelper($arr, 0, $n - 1, $result);
    return $result;
}

function permuteHelper(&$arr, $left, $right, &$result) {
    if ($left == $right) {
        $result[] = $arr;
    } else {
        for ($i = $left; $i <= $right; $i++) {
            $this->swap($arr, $left, $i);
            $this->permuteHelper($arr, $left + 1, $right, $result);
            $this->swap($arr, $left, $i);
        }
    }
}

function swap(&$arr, $i, $j) {
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}
}
