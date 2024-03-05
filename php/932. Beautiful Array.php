class Solution {

/**
 * @param Integer $n
 * @return Integer[]
 */
function beautifulArray($n) {
    $result = [1];
    
    while (count($result) < $n) {
        $temp = [];
        
        foreach ($result as $num) {
            if ($num * 2 - 1 <= $n) {
                $temp[] = $num * 2 - 1;
            }
        }
        
        foreach ($result as $num) {
            if ($num * 2 <= $n) {
                $temp[] = $num * 2;
            }
        }
        
        $result = $temp;
    }
    
    return $result;
}
}