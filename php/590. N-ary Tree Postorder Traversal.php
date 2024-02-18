/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return integer[]
     */
    function postorder($root) {
        $result = array();
        $this->traverse($root, $result);
        return $result;
    }
    
    function traverse($node, &$result) {
        if ($node == null) {
            return;
        }
        
        foreach ($node->children as $child) {
            $this->traverse($child, $result);
        }
        
        $result[] = $node->val;
    }
}
