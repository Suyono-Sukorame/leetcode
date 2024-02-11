class Solution {

/**
 * @param Integer[][] $matrix
 * @param Integer $k
 * @return Integer
 */
function maxSumSubmatrix($matrix, $k) {
    $rows = count($matrix);
    $cols = count($matrix[0]);
    $maxSum = PHP_INT_MIN;
    
    for ($left = 0; $left < $cols; $left++) {
        $rowSum = array_fill(0, $rows, 0);
        
        for ($right = $left; $right < $cols; $right++) {
            for ($i = 0; $i < $rows; $i++) {
                $rowSum[$i] += $matrix[$i][$right];
            }
            
            $maxSum = max($maxSum, $this->maxSumSubArray($rowSum, $k));
        }
    }
    
    return $maxSum;
}

function maxSumSubArray($arr, $k) {
    $maxSum = PHP_INT_MIN;
    $prefixSum = 0;
    $set = [];
    $set[] = 0;
    $currSum = 0;
    
    foreach ($arr as $num) {
        $prefixSum += $num;
        $index = $this->binarySearchCeiling($set, $prefixSum - $k);
        
        if ($index !== false) {
            $maxSum = max($maxSum, $prefixSum - $set[$index]);
        }
        
        // Insert prefix sum into set
        $currSum += $num;
        $this->insertIntoSet($set, $currSum);
    }
    
    return $maxSum;
}

function binarySearchCeiling($arr, $target) {
    $left = 0;
    $right = count($arr) - 1;
    $ceiling = false;
    
    while ($left <= $right) {
        $mid = $left + intdiv($right - $left, 2);
        
        if ($arr[$mid] == $target) {
            return $mid;
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $ceiling = $mid;
            $right = $mid - 1;
        }
    }
    
    return $ceiling;
}

function insertIntoSet(&$arr, $val) {
    $insertIndex = count($arr);
    
    foreach ($arr as $index => $num) {
        if ($num >= $val) {
            $insertIndex = $index;
            break;
        }
    }
    
    array_splice($arr, $insertIndex, 0, $val);
}
}
