class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function findDuplicate($nums) {
    $slow = $nums[0];
    $fast = $nums[0];
    
    do {
        $slow = $nums[$slow];
        $fast = $nums[$nums[$fast]];
    } while ($slow != $fast);
    
    $ptr1 = $nums[0];
    $ptr2 = $slow;
    while ($ptr1 != $ptr2) {
        $ptr1 = $nums[$ptr1];
        $ptr2 = $nums[$ptr2];
    }
    
    return $ptr1;
}
}
