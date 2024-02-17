class Solution {
    /**
     * @param Integer[] $w
     */
    function __construct($w) {
        $this->prefixSum = [];
        $this->totalSum = 0;

        for($i = 0; $i < count($w); $i++){
            $this->totalSum += $w[$i];
            $this->prefixSum[] = $this->totalSum;
        }
    }
  
    /**
     * @return Integer
     */
    function pickIndex() {
        $randomNum = rand(1, $this->totalSum);
        $index = $this->binarySearch($this->prefixSum, $randomNum);
        return $index;
    }

    function binarySearch($arr, $target){
        $left = 0;
        $right = count($arr) - 1;

        while($left < $right){
            $mid = ($left + $right) >> 1;

            if($arr[$mid] < $target){
                $left = $mid + 1;
            }else{
                $right = $mid;
            }
        }

        return $left;
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($w);
 * $ret_1 = $obj->pickIndex();
 */