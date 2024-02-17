class Solution {

/**
 * @param Integer[] $nums
 * @return String
 */
function optimalDivision($nums) {
    $count = count($nums);
    if ($count == 1) return "".$nums[0];
    if ($count == 2) return $nums[0]."/".$nums[1];
    
    $result = $nums[0]."/(".$nums[1];
    for ($i = 2; $i < $count; $i++) {
        $result .= "/".$nums[$i];
    }
    $result .= ")";
    
    return $result;
}
}

$solution = new Solution();
$nums1 = [1000,100,10,2];
echo $solution->optimalDivision($nums1); 

$nums2 = [2,3,4];
echo $solution->optimalDivision($nums2); 
