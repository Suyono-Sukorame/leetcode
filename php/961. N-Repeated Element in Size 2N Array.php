class Solution {

function repeatedNTimes($nums) {
    $counter = array();
    foreach ($nums as $num) {
        if (isset($counter[$num])) {
            return $num;
        } else {
            $counter[$num] = true;
        }
    }
    return -1;
}
}
