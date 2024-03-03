class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArray($nums) {
        if (count($nums) <= 1) {
            return $nums;
        }
        
        $mergeSort = function ($array) use (&$mergeSort) {
            $length = count($array);
            if ($length <= 1) {
                return $array;
            }
            
            $mid = intdiv($length, 2);
            $left = $mergeSort(array_slice($array, 0, $mid));
            $right = $mergeSort(array_slice($array, $mid));
            
            return $this->merge($left, $right);
        };
        
        return $mergeSort($nums);
    }
    
    private function merge($left, $right) {
        $result = [];
        $i = $j = 0;
        
        while ($i < count($left) && $j < count($right)) {
            if ($left[$i] < $right[$j]) {
                $result[] = $left[$i++];
            } else {
                $result[] = $right[$j++];
            }
        }
        
        while ($i < count($left)) {
            $result[] = $left[$i++];
        }
        
        while ($j < count($right)) {
            $result[] = $right[$j++];
        }
        
        return $result;
    }
}
