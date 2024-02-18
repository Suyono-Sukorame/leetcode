class Solution {

/**
 * @param String $s1
 * @param String $s2
 * @return Boolean
 */
function checkInclusion($s1, $s2){
$s1 = str_split($s1); 
$s2 = str_split($s2);
$s1_c_v = array_count_values($s1);
for($i=0;$i<=count($s2)-count($s1);$i++){
    $arr = array_slice($s2,$i,count($s1));
    $arr_c_v = array_count_values($arr);
    if(array_diff_assoc($s1_c_v,$arr_c_v)==null){
        return true;
    }
}
return false;
}
}