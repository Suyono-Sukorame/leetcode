class Solution {

function pancakeSort($arr) {
    $result = [];
    $n = count($arr);
    
    for ($i = $n; $i > 0; $i--) {
        $maxIndex = array_search(max(array_slice($arr, 0, $i)), $arr);
        
        if ($maxIndex == $i - 1) {
            continue;
        }
        
        if ($maxIndex != 0) {
            $this->flip($arr, $maxIndex + 1);
            $result[] = $maxIndex + 1;
        }
        
        $this->flip($arr, $i);
        $result[] = $i;
    }
    
    return $result;
}

function flip(&$arr, $k) {
    $start = 0;
    $end = $k - 1;
    while ($start < $end) {
        $temp = $arr[$start];
        $arr[$start] = $arr[$end];
        $arr[$end] = $temp;
        $start++;
        $end--;
    }
}
}
