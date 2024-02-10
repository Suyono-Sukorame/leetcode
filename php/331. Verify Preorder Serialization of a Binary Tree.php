class Solution {

/**
 * @param String $preorder
 * @return Boolean
 */
function isValidSerialization($preorder) {
    $nodes = explode(",", $preorder);
    $slot = 1;
    
    foreach ($nodes as $node) {
        $slot--;
        if ($slot < 0) return false;
        
        if ($node != '#') {
            $slot += 2;
        }
    }
    
    return $slot == 0;
}
}
