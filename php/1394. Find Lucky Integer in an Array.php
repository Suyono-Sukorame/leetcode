class Solution {

function findLucky($arr) {
    $count = array();
    
    foreach ($arr as $num) {
        if (isset($count[$num])) {
            $count[$num]++;
        } else {
            $count[$num] = 1;
        }
    }
    
    $lucky = -1;
    
    foreach ($count as $num => $freq) {
        if ($num == $freq && $freq > $lucky) {
            $lucky = $num;
        }
    }
    
    return $lucky;
}
}
